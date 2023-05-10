<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SlideSeeder extends Seeder
{
    public function run()
    {
        //memasukkan data setting ke tabel setting
        DB::table('slide')->insert([
            'judul' => "MTs Jakarta Barat",
            'deskripsi' => "PPDB Online adalah digitalisasi Proses Penerimaan Peserta Didik baru yang dilakukan melalui sebuah sistem yang dirancang untuk mengelola data input dari pendaftar yang kemudian dikirim ke sekolah pelaksana PPDB, pada umumnya proses ini dilakukan pada sebuah laman Website, SMS, atau Aplikasi Pesan singkat.",
            'gambar' => "guru.jpg",
        ]);
    }
}
