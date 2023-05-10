<?php

namespace App\Exports;

use App\Models\Pendaftar;
use App\Models\Periode;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Carbon\Carbon;
class ExportPendaftar implements FromArray, ShouldAutoSize
{
    
    public function array(): array
    {
        
        $periode = Periode::where('aktif','=','Y')->first();
        $pendaftar = Pendaftar::where('id_periode','=',$periode->id)->get();

        $data = array();
        $data[] = array(
            'NO', 
            'NO PENDAFTAR',
            'TGL. DAFTAR',
            'JURUSAN',
            'STATUS SELEKSI',

            'NAMA',
            'NISN',
            'TEMPAT & TANGGAL LAHIR',
            'JENIS KELAMIN',
            'ANAK KE',
            'JUMLAH SAUDARA',
            'AGAMA',
            'HP',
            'HOBI',
            'CITA CITA',

            'JENIS TEMPAT TINGGAL',
            'ALAMAT',
            'DESA',
            'KECAMATAN',
            'KOTA',
            'PROPINSI',
            'RT',
            'RW',
            'KODE POS',
            'JARAK',
            'TRANSPORTASI',

            'NO KK',
            'NAMA KK',
            'NO KKS',
            'NO PKH',
            'NO KIP',
            'NAMA AYAH',
            'NIK AYAH',
            'TAHUN LAHIR AYAH',
            'STATUS AYAH',
            'PEKERJAAN AYAH',
            'PENGHASILAN AYAH',
            'PENDIDIKAN AYAH',
            'NAMA IBU',
            'NIK IBU',
            'TAHUN LAHIR IBU',
            'STATUS IBU',
            'PEKERJAAN IBU',
            'PENGHASILAN IBU',
            'PENDIDIKAN IBU',
            'NAMA WALI',
            'NIK WALI',
            'TAHUN LAHIR WALI',
            'STATUS WALI',
            'PEKERJAAN WALI',
            'PENGHASILAN WALI',
            'PENDIDIKAN WALI',
            'HP WALI',

            'NAMA SEKOLAH',
            'JENJANG SEKOLAH',
            'STATUS SEKOLAH',
            'LOKASI SEKOLAH',
            'TAHUN LULUS',
            'NO UN',
            'PRESTASI',
        );
        $no = 0;
        foreach($pendaftar as $p){
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $p->periode->tahun.substr('0000'.$p->no_pendaftar,-4);
            $row[] = $p->created_at->isoFormat('dddd, D MMMM Y');
            $row[] = $p->jurusan->singkatan;
            $row[] = $p->status_seleksi;

            $row[] = $p->nama;
            $row[] = $p->nisn;
            $row[] = $p->tempat_lahir.', '.Carbon::parse($p->tanggal_lahir)->isoFormat('D MMMM Y');
            $row[] = $p->jenis_kelamin;
            $row[] = $p->anak_ke;
            $row[] = $p->jumlah_saudara;
            $row[] = $p->agama;
            $row[] = $p->hp;
            $row[] = $p->hobi;
            $row[] = $p->cita_cita ;

            $row[] = $p->jenis_tempat_tinggal;
            $row[] = $p->alamat;
            $row[] = $p->desa;
            $row[] = $p->kecamatan;
            $row[] = $p->kota;
            $row[] = $p->propinsi;
            $row[] = $p->rt;
            $row[] = $p->rw;
            $row[] = $p->kode_pos;
            $row[] = $p->jarak;
            $row[] = $p->transportasi;

            $row[] = $p->no_kk;
            $row[] = $p->nama_kk;
            $row[] = $p->no_kks;
            $row[] = $p->no_pkh;
            $row[] = $p->no_kip;
            $row[] = $p->nama_ayah;
            $row[] = $p->nik_ayah;
            $row[] = $p->tahun_lahir_ayah;
            $row[] = $p->status_ayah;
            $row[] = $p->pekerjaan_ayah;
            $row[] = $p->penghasilan_ayah;
            $row[] = $p->pendidikan_ayah;
            $row[] = $p->nama_ibu;
            $row[] = $p->nik_ibu;
            $row[] = $p->tahun_lahir_ibu;
            $row[] = $p->status_ibu;
            $row[] = $p->pekerjaan_ibu;
            $row[] = $p->penghasilan_ibu;
            $row[] = $p->pendidikan_ibu;
            $row[] = $p->nama_wali;
            $row[] = $p->nik_wali;
            $row[] = $p->tahun_lahir_wali;
            $row[] = $p->status_wali;
            $row[] = $p->pekerjaan_wali;
            $row[] = $p->penghasilan_wali;
            $row[] = $p->pendidikan_wali;
            $row[] = $p->hp_wali;

            $row[] = $p->nama_sekolah;
            $row[] = $p->jenjang_sekolah;
            $row[] = $p->status_sekolah;
            $row[] = $p->lokasi_sekolah;
            $row[] = $p->tahun_lulus;
            $row[] = $p->no_un;
            $row[] = $p->prestasi;

            $data[] = $row;
        }

        return $data;
    }
}
