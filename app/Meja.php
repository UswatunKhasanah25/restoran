<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    protected $table = 'mejas';
    protected $fillable = ['nomor'];

    public function pemesanan()
    {
        return $this->hasOne('App\Pemesanan', 'no_meja');
    }
}
