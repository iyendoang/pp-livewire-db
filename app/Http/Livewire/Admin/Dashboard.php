<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Charts\DashboardChart;

use App\Models\Jurusan;
use App\Models\Pendaftar;

class Dashboard extends Component
{
    public function render()
    {

        $jurusan = Jurusan::all();
        $label = [];
        $lakilaki = [];
        $perempuan = [];
        $total = [];

        //ambil data tiap jurusan
        foreach($jurusan as $jur){
            $jmllakilaki = Pendaftar::where(['id_jurusan'=> $jur->id, 'jenis_kelamin'=>'L'])->count();
            $jmlperempuan = Pendaftar::where(['id_jurusan'=> $jur->id, 'jenis_kelamin'=>'P'])->count();
            $jmlpendaftar = Pendaftar::where(['id_jurusan'=> $jur->id])->count();

            $label[] = $jur->nama_jurusan;
            $lakilaki[] = $jmllakilaki;
            $perempuan[] = $jmlperempuan;
            $total[] = $jmlpendaftar;
        }
           
        //membuat cart dari data jurusan
        $chart = new DashboardChart;
        $chart->labels($label);
        $chart->dataset("Laki-laki","bar", $lakilaki)->backGroundColor('#3490dc');
        $chart->dataset("Perempuan","bar", $perempuan)->backGroundColor('#f66d9b');
        $chart->dataset("Total","bar", $total)->backGroundColor('#6574cd');

        //Data untuk ditampilkan pada card
        $blmdikonfirmasi = Pendaftar::where(['status_seleksi'=> 'Belum Dikonfirmasi'])->count();
        $diterima = Pendaftar::where(['status_seleksi'=> 'Diterima'])->count();
        $ditolak = Pendaftar::where(['status_seleksi'=> 'Ditolak'])->count();
        $pendaftar = Pendaftar::count();
        
        //return view beserta data yang dibutuhkan
        return view('livewire.admin.dashboard',[
            'chart' => $chart,
            'blmdikonfirmasi' => $blmdikonfirmasi,
            'diterima' => $diterima,
            'ditolak' => $ditolak,
            'pendaftar' => $pendaftar,
        ]);
    }
}
