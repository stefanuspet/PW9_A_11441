<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamBuku extends Model
{
    use HasFactory;
    protected $table = 'pinjam_bukus';
    protected $primaryKey = 'id_pinjam_buku';
    protected $fillable = [
        "id_buku",
        "id_peminjam",
        "tanggal_pinjam",
        "tanggal_kembali",
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'id_peminjam', 'id_user');
    }
}
