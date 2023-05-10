<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SettingSeeder extends Seeder
{
    public function run()
    {
        //memasukkan data setting ke tabel setting
        DB::table('setting')->insert([
        	'nama_sekolah' => "MTs Jakarta Barat",
        	'alamat_sekolah' => "Jl. Bambularangan RT.008/009",
        	'email_sekolah' => "mts@mtsjb.id",
        	'telp_sekolah' => "(089) 0000000000000",
        	'logo_sekolah' => "logo.png",
        	'judul_header' => "header.png",
        ]);
    }
}