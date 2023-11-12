<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\PinjamBuku;
use Illuminate\Http\Request;

class PinjamBukuController extends Controller
{
    //index
    public function index()
    {
        $buku = Buku::where('status', 'Tersedia')->where('id_penerbit', '<>', auth()->user()->id_user)->paginate(5);
        return view('pinjam.index', compact('buku'));
    }
    public function pinjamBuku($id_buku)
    {
        $buku = Buku::find($id_buku);

        $data = [
            'id_buku' => $buku->id_buku,
            'id_peminjam' => auth()->user()->id_user,
            'tanggal_pinjam' => date('Y-m-d'),
            'tanggal_kembali' => date('Y-m-d', strtotime('+7 days')),
        ];

        PinjamBuku::create($data);
        Buku::where('id_buku', $id_buku)->update([
            'status' => 'Dipinjam'
        ]);
        return redirect()->route('pinjam.index')->with('success', 'Buku berhasil dipinjam');
    }

    public function kembalikanView()
    {
        $peminjam = PinjamBuku::where('id_peminjam', auth()->user()->id_user)->paginate(5);
        return view('pinjam.kembalikan', compact('peminjam'));
    }

    public function kembalikan($id)
    {
        $peminjam = PinjamBuku::find($id);
        $id_buku = $peminjam->id_buku;
        $buku = Buku::find($id_buku);
        $buku->update([
            'status' => 'Tersedia'
        ]);
        $peminjam->update([
            'tanggal_kembali' => date('Y-m-d')
        ]);
        return redirect()->route('kembalikanView')->with('success', 'Buku berhasil dikembalikan');
    }
}
