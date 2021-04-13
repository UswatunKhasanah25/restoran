<?php

use App\Pelanggan;
use Illuminate\Database\Seeder;

class PelangganTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pelanggan::create([
            "nama" => "Mirna",
            "email" => "mirna123@gmail.com"
        ]);
    }
}
