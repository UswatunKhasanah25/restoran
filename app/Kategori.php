<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';
    protected $fillable = ['nama'];

    public function makanan()
    {
        return $this->hasMany('App\Makanan', 'id_kategori');
    }
}
