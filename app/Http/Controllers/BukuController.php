<?php

namespace App\Http\Controllers;
// model buku
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BukuController extends Controller
{
    //index
    public function index()
    {
        $filter = Buku::where('id_penerbit', auth()->user()->id_user)->paginate(5);
        $bukus = Buku::latest()->paginate(5);
        return view('buku.index', compact('bukus', 'filter'));
    }
    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'penulis' => 'required',
        ]);

        $data = [
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'status' => 'Tersedia',
            'id_penerbit' => auth()->user()->id_user,
        ];

        Buku::create($data);
        return redirect()->route('index')->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit($id_buku)
    {
        $buku = Buku::find($id_buku);
        return view('buku/edit', compact('buku'));
    }
    public function update(Request $request, $id_buku)
    {
        $buku = Buku::find($id_buku);
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
        ]);

        $buku->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
        ]);

        return redirect()->route('index')->with('success', 'Buku berhasil diupdate');
    }
    public function destroy($id_buku)
    {
        $bukus = Buku::find($id_buku);
        $bukus->delete();
        return redirect()->route('index');
    }
}
