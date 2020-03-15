<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis';

    protected $fillable = [
        'id', 'id_buku', 'id_user', 'tgl_pinjam', 'tgl_kembali', 'created_at', 'updated_at'
    ];

    // protected $hidden = ['created_at', 'updated_at', 'id_user', 'id_buku'];

    // public function buku() {
    //     return $this->belongsTo('App\Buku', 'id_buku');
    // }

    public function user() {
        return $this->belongsTo('App\User', 'id_user');
    }    
    public function bukus(){
        return $this->belongsTo('App\Buku', 'id_buku');
    }
}
