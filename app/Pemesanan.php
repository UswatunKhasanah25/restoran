<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanans';
    protected $guarded = ['id', 'created_ad', 'updated_at'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function makanan()
    {
        return $this->belongsTo('App\Makanan');
    }
    public function meja()
    {
        return $this->hasOne('App\Meja', 'no_meja');
    }
}
