<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    protected $table = 'makanans';
    protected $fillable = ['nama', 'id_kategori', 'harga', 'stok', 'photo'];
    
    public function kategori()
    {
        return $this->belongsTo('App\Kategori', 'id_kategori');
    }
    public function pemesanan()
    {
        return $this->hasMany('App\Pemesanan', 'makanan_id');
    }
}
