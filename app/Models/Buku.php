<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'bukus';
    protected $primaryKey = 'id_buku';
    protected $fillable = [
        "judul",
        "penulis",
        "id_penerbit",
        "status",
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'id_penerbit', 'id_user');
    }
}
