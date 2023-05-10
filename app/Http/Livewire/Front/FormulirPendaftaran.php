<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Pendaftar;
use App\Models\Periode;
use App\Models\Jurusan;
use Auth;
class FormulirPendaftaran extends Component
{
    //deklarasi semua properti
    public $id_pendaftar;
    public $id_user;
    public $id_jurusan;
    public $id_periode;
    public $no_pendaftar;
    public $status_seleksi = 'Belum Dikonfirmasi';
    public $nama;
    public $nisn;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $jenis_kelamin = 'L';
    public $anak_ke;
    public $jumlah_saudara;
    public $agama;
    public $hp;
    public $hobi;
    public $cita_cita;

    public $jenis_tempat_tinggal;
    public $alamat;
    public $desa;
    public $kecamatan;
    public $kota;
    public $propinsi;
    public $rt;
    public $rw;
    public $kode_pos;
    public $jarak;
    public $transportasi;

    public $no_kk;
    public $nama_kk;
    public $no_kks;
    public $no_pkh;
    public $no_kip;
    public $nama_ayah;
    public $nik_ayah;
    public $tahun_lahir_ayah;
    public $status_ayah;
    public $pekerjaan_ayah;
    public $penghasilan_ayah;
    public $pendidikan_ayah;
    public $nama_ibu;
    public $nik_ibu;
    public $tahun_lahir_ibu;
    public $status_ibu;
    public $pekerjaan_ibu;
    public $penghasilan_ibu;
    public $pendidikan_ibu;
    public $nama_wali;
    public $nik_wali;
    public $tahun_lahir_wali;
    public $status_wali;
    public $pekerjaan_wali;
    public $penghasilan_wali;
    public $pendidikan_wali;
    public $hp_wali;

    public $nama_sekolah;
    public $jenjang_sekolah;
    public $status_sekolah;
    public $lokasi_sekolah;
    public $tahun_lulus;
    public $no_un;
    public $prestasi;

    public $step = 0;

    //menentukan nilai awal properti sesuai setatus pendaftaran (baru atau edit)
    public function __construct(){
        $this->id_user = Auth::user()->id;
        $this->nama = Auth::user()->name;

        //cek periode aktif
        $periode = Periode::where('aktif','=', 'Y')->first();
        if($periode) $this->id_periode = $periode->id;

        $siswa = Pendaftar::where('id_user', '=', $this->id_user)->first();
        if($siswa){
            $this->id_pendaftar = $siswa->id;

            $this->id_jurusan = $siswa->id_jurusan;
            $this->nisn = $siswa->nisn;
            $this->tempat_lahir = $siswa->tempat_lahir;
            $this->tanggal_lahir = $siswa->tanggal_lahir;
            $this->jenis_kelamin = $siswa->jenis_kelamin;
            $this->anak_ke = $siswa->anak_ke;
            $this->jumlah_saudara = $siswa->jumlah_saudara;
            $this->agama = $siswa->agama;
            $this->hp = $siswa->hp;
            $this->hobi = $siswa->hobi;
            $this->cita_cita = $siswa->cita_cita;

            $this->jenis_tempat_tinggal = $siswa->jenis_tempat_tinggal;
            $this->alamat = $siswa->alamat;
            $this->desa = $siswa->desa;
            $this->kecamatan = $siswa->kecamatan;
            $this->kota = $siswa->kota;
            $this->propinsi = $siswa->propinsi;
            $this->rt = $siswa->rt;
            $this->rw = $siswa->rw;
            $this->kode_pos = $siswa->kode_pos;
            $this->jarak = $siswa->jarak;
            $this->transportasi = $siswa->transportasi;


            $this->no_kk = $siswa->no_kk;
            $this->nama_kk = $siswa->nama_kk;
            $this->no_kks = $siswa->no_kks;
            $this->no_pkh = $siswa->no_pkh;
            $this->no_kip = $siswa->no_kip;
            $this->nama_ayah = $siswa->nama_ayah;
            $this->nik_ayah = $siswa->nik_ayah;
            $this->tahun_lahir_ayah = $siswa->tahun_lahir_ayah;
            $this->status_ayah = $siswa->status_ayah;
            $this->pekerjaan_ayah = $siswa->pekerjaan_ayah;
            $this->penghasilan_ayah = $siswa->penghasilan_ayah;
            $this->pendidikan_ayah = $siswa->pendidikan_ayah;
            $this->nama_ibu = $siswa->nama_ibu;
            $this->nik_ibu = $siswa->nik_ibu;
            $this->tahun_lahir_ibu = $siswa->tahun_lahir_ibu;
            $this->status_ibu = $siswa->status_ibu;
            $this->pekerjaan_ibu = $siswa->pekerjaan_ibu;
            $this->penghasilan_ibu = $siswa->penghasilan_ibu;
            $this->pendidikan_ibu = $siswa->pendidikan_ibu;
            $this->nama_wali = $siswa->nama_wali;
            $this->nik_wali = $siswa->nik_wali;
            $this->tahun_lahir_wali = $siswa->tahun_lahir_wali;
            $this->status_wali = $siswa->status_wali;
            $this->pekerjaan_wali = $siswa->pekerjaan_wali;
            $this->penghasilan_wali = $siswa->penghasilan_wali;
            $this->pendidikan_wali = $siswa->pendidikan_wali;
            $this->hp_wali = $siswa->hp_wali;


            $this->nama_sekolah = $siswa->nama_sekolah;
            $this->jenjang_sekolah = $siswa->jenjang_sekolah;
            $this->status_sekolah = $siswa->status_sekolah;
            $this->lokasi_sekolah = $siswa->lokasi_sekolah;
            $this->tahun_lulus = $siswa->tahun_lulus;
            $this->no_un = $siswa->no_un;
            $this->prestasi = $siswa->prestasi;
        }
    }

    //render view blade
    public function render()
    {
        $jurusan = Jurusan::all();
        $periode = Periode::where('aktif','=', 'Y')->first();
        return view('livewire.front.formulir-pendaftaran', [
            'jurusan' => $jurusan,
            'periode' => $periode
        ]);
    }

    public function save(){
        $periode = Periode::where('aktif','=','Y')->first();
        if($this->step == 0){//cek tahapan pendaftaran
            //validasi tahap pertama
            $this->validate([
                'id_user' => 'required',
                'id_jurusan' => 'required',
                'id_periode' => 'required',
                'status_seleksi' => 'required',
                'nama' => 'required',
                'nisn' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'anak_ke' => 'required',
                'jumlah_saudara' => 'required',
                'agama' => 'required',
                'hp' => 'required',
                'hobi' => 'required',
                'cita_cita' => 'required',
            ]);

            //cek data pendaftar dan tentukan mode penyimpanan
            $siswa = Pendaftar::where('id_user', '=', $this->id_user)->first();
            $save_mode = ($siswa) ? 'update' : 'create';

            //pengaturan jika mode simpan create
            if($save_mode == 'create'){
                $siswa = new Pendaftar;

                $max = Pendaftar::where('id_periode','=',$periode->id)->max('no_pendaftar');
                $siswa->no_pendaftar = $max+1;
            }

            //simpan data tahap pertama
            $siswa->id_user = $this->id_user;
            $siswa->id_jurusan = $this->id_jurusan;
            $siswa->id_periode = $this->id_periode;
            $siswa->status_seleksi = $this->status_seleksi;
            $siswa->nama = $this->nama;
            $siswa->nisn = $this->nisn;
            $siswa->tempat_lahir = $this->tempat_lahir;
            $siswa->tanggal_lahir = $this->tanggal_lahir;
            $siswa->jenis_kelamin = $this->jenis_kelamin;
            $siswa->anak_ke = $this->anak_ke;
            $siswa->jumlah_saudara = $this->jumlah_saudara;
            $siswa->agama = $this->agama;
            $siswa->hp = $this->hp;
            $siswa->hobi = $this->hobi;
            $siswa->cita_cita = $this->cita_cita;

            //simpan data sesuai mode penyimpanan
            if($save_mode == 'create') $siswa->save();
            else $siswa->update();

        }elseif($this->step == 1){
            //validasi penyimpanan tahapan kedua
            $this->validate([
                'jenis_tempat_tinggal' => 'required',
                'alamat' => 'required',
                'desa' => 'required',
                'kecamatan' => 'required',
                'kota' => 'required',
                'propinsi' => 'required',
                'rt' => 'required',
                'rw' => 'required',
                'kode_pos' => 'required',
                'jarak' => 'required',
                'transportasi' => 'required',
            ]);

            //simpan data tahapan kedua
            $siswa = Pendaftar::find($this->id_pendaftar);
            $siswa->jenis_tempat_tinggal = $this->jenis_tempat_tinggal;
            $siswa->alamat = $this->alamat;
            $siswa->desa = $this->desa;
            $siswa->kecamatan = $this->kecamatan;
            $siswa->kota = $this->kota;
            $siswa->propinsi = $this->propinsi;
            $siswa->rt = $this->rt;
            $siswa->rw = $this->rw;
            $siswa->kode_pos = $this->kode_pos;
            $siswa->jarak = $this->jarak;
            $siswa->transportasi = $this->transportasi;            
            $siswa->update();

        }elseif($this->step == 2){
            //validasi tahapan ketiga
            $this->validate([
                'no_kk' => 'required',
                'nama_kk' => 'required',
                'nama_ayah' => 'required',
                'nik_ayah' => 'required',
                'tahun_lahir_ayah' => 'required',
                'status_ayah' => 'required',
                'pekerjaan_ayah' => 'required',
                'penghasilan_ayah' => 'required',
                'pendidikan_ayah' => 'required',
                'nama_ibu' => 'required',
                'nik_ibu' => 'required',
                'tahun_lahir_ibu' => 'required',
                'status_ibu' => 'required',
                'pekerjaan_ibu' => 'required',
                'penghasilan_ibu' => 'required',
                'pendidikan_ibu' => 'required',
            ]);

            //simpan data tahapan ketiga
            $siswa = Pendaftar::find($this->id_pendaftar);
            $siswa->no_kk = $this->no_kk;
            $siswa->nama_kk = $this->nama_kk;
            $siswa->no_kks = $this->no_kks;
            $siswa->no_pkh = $this->no_pkh;
            $siswa->no_kip = $this->no_kip;
            $siswa->nama_ayah = $this->nama_ayah;
            $siswa->nik_ayah = $this->nik_ayah;
            $siswa->tahun_lahir_ayah = $this->tahun_lahir_ayah;
            $siswa->status_ayah = $this->status_ayah;
            $siswa->pekerjaan_ayah = $this->pekerjaan_ayah;
            $siswa->penghasilan_ayah = $this->penghasilan_ayah;
            $siswa->pendidikan_ayah = $this->pendidikan_ayah;
            $siswa->nama_ibu = $this->nama_ibu;
            $siswa->nik_ibu = $this->nik_ibu;
            $siswa->tahun_lahir_ibu = $this->tahun_lahir_ibu;
            $siswa->status_ibu = $this->status_ibu;
            $siswa->pekerjaan_ibu = $this->pekerjaan_ibu;
            $siswa->penghasilan_ibu = $this->penghasilan_ibu;
            $siswa->pendidikan_ibu = $this->pendidikan_ibu;
            $siswa->nama_wali = $this->nama_wali;
            $siswa->nik_wali = $this->nik_wali;
            $siswa->tahun_lahir_wali = $this->tahun_lahir_wali;
            $siswa->status_wali = $this->status_wali;
            $siswa->pekerjaan_wali = $this->pekerjaan_wali;
            $siswa->penghasilan_wali = $this->penghasilan_wali;
            $siswa->pendidikan_wali = $this->pendidikan_wali;
            $siswa->hp_wali = $this->hp_wali;            
            $siswa->update();

        }elseif($this->step == 3){
            //validasi tahapan terakhir
            $this->validate([
                'nama_sekolah' => 'required',
                'jenjang_sekolah' => 'required',
                'status_sekolah' => 'required',
                'lokasi_sekolah' => 'required',
                'tahun_lulus' => 'required',
                'no_un' => 'required',
                'prestasi' => 'required',
            ]);

            //simpan data tahapan terakhir
            $siswa = Pendaftar::find($this->id_pendaftar);
            $siswa->nama_sekolah = $this->nama_sekolah;
            $siswa->jenjang_sekolah = $this->jenjang_sekolah;
            $siswa->status_sekolah = $this->status_sekolah;
            $siswa->lokasi_sekolah = $this->lokasi_sekolah;
            $siswa->tahun_lulus = $this->tahun_lulus;
            $siswa->no_un = $this->no_un;
            $siswa->prestasi = $this->prestasi;            
            $siswa->update();
        }

        $this->step += 1;//naikan tahapan pendaftaran

        //kirim pesan keberhasilan melalui event browser
        $this->dispatchBrowserEvent('show-message',['msg'=>'Data telah disimpan']);

        //redirect ke dashboard jika pada penyimpanan tahapan terakhir
        if($this->step > 3){
            return redirect('/dashboard');
        }
    }

    //ke tahapan sebelumnya
    public function prevStep(){
        if($this->step > 0) $this->step -= 1;
    }
}
