<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    protected $table = 'makanans';
    protected $fillable = ['nama', 'id_kategori', 'harga', 'stok'];
    
    public function kategori()
    {
        return $this->belongsTo('App\Kategori', 'id_kategori');
    }
}
