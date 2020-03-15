<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'bukus';

    protected $fillable = [
        'isbn',
        'judul',
        'id_kategori',
        'pengarang',
        'penerbit',
        'tahun',
        'stok',
        'image'
    ];

    public function kategori()
    {
        return $this->belongsTo('App\Kategori', 'id_kategori');
    }
}
