<x-form-modal>
    <x-slot name="header">
        Detail Pendaftar
    </x-slot>

    <x-slot name="close">
        <button type="button" class="btn-close" @click="showDetail = false"></button>
    </x-slot>

<table class="table">
@if($pendaftar)
    <tr><td colspan="2"> <h4><b>Data Pribadi</b></h4></td></tr>

    <tr><td width="25%"> No Pendaftar </td><td>: <b>{{ $pendaftar->periode->tahun.substr('0000'.$pendaftar->no_pendaftar,-4)}}</b></td></tr>
    <tr><td> Tgl. Daftar </td><td>: <b>{{ $pendaftar->created_at->isoFormat('dddd, D MMMM Y') }}</b></td></tr>
    <tr><td> Nama </td><td>: <b>{{$pendaftar->nama }}</b></td></tr>
    <tr><td> NISN </td><td>: <b>{{$pendaftar->nisn }}</b></td></tr>
    <tr><td> Tempat & Tanggal Lahir </td><td>: <b>{{$pendaftar->tempat_lahir }}, {{Carbon\Carbon::parse($pendaftar->tanggal_lahir)->isoFormat('D MMMM Y')}}</b></td></tr>
    <tr><td> Jenis Kelamin </td><td>: <b>@if($pendaftar->jenis_kelamin=='L') Laki-laki @else Perempuan @endif</b></td></tr>
    <tr><td> Anak Ke </td><td>: <b>{{$pendaftar->anak_ke }}</b></td></tr>
    <tr><td> Hobi </td><td>: <b>{{$pendaftar->hobi }}</b></td></tr>
    <tr><td> Cita-cita </td><td>: <b>{{$pendaftar->cita_cita }}</b></td></tr>
    <tr><td> Jurusan </td><td>: <b>{{$pendaftar->jurusan->nama_jurusan }}</b></td></tr>
   
    <tr><td colspan="2"> <h4><b>Data Alamat</b></h4></td></tr>

    <tr><td> Alamat </td><td>: <b>{{$pendaftar->alamat }}</b></td></tr>
    <tr><td> Desa </td><td>: <b>{{$pendaftar->desa }}</b></td></tr>
    <tr><td> Jumlah Saudara </td><td>: <b>{{$pendaftar->jumlah_saudara }}</b></td></tr>
    <tr><td> Anak Ke </td><td>: <b>{{$pendaftar->anak_ke }}</b></td></tr>
    <tr><td> Propinsi </td><td>: <b>{{$pendaftar->propinsi }}</b></td></tr>
    <tr><td> RT </td><td>: <b>{{$pendaftar->rt }}</b></td></tr>
    <tr><td> RW </td><td>: <b>{{$pendaftar->rw }}</b></td></tr>
    <tr><td> Kode Pos </td><td>: <b>{{$pendaftar->kode_pos }}</b></td></tr>
    <tr><td> Jarak </td><td>: <b>{{$pendaftar->jarak }}</b></td></tr>
    <tr><td> Transportasi </td><td>: <b>{{$pendaftar->transportasi }}</b></td></tr>
    
    <tr><td colspan="2"> <h4><b>Data Keluarga</b></h4></td></tr>

    <tr><td colspan="2"> <h5><b>Kepala Keluarga</b></h5></td></tr>
    <tr><td> No KK </td><td>: <b>{{$pendaftar->no_kk }}</b></td></tr>
    <tr><td> Nama KK </td><td>: <b>{{$pendaftar->nama_kk }}</b></td></tr>   
   
    <tr><td colspan="2"> <h5><b>Ayah</b></h5></td></tr>
    <tr><td> Nama Ayah </td><td>: <b>{{$pendaftar->nama_ayah }}</b></td></tr>
    <tr><td> NIK Ayah </td><td>: <b>{{$pendaftar->nik_ayah }}</b></td></tr>
    <tr><td> Tahun Lahir Ayah </td><td>: <b>{{$pendaftar->tahun_lahir_ayah }}</b></td></tr>
    <tr><td> Status Ayah </td><td>: <b>{{$pendaftar->status_ayah }}</b></td></tr>
    <tr><td> Pekerjaan Ayah </td><td>: <b>{{$pendaftar->pekerjaan_ayah }}</b></td></tr>
    <tr><td> Penghasilan Ayah </td><td>: <b>{{$pendaftar->penghasilan_ayah }}</b></td></tr>
    <tr><td> Pendidikan Ayah </td><td>: <b>{{$pendaftar->pendidikan_ayah }}</b></td></tr>
   
   
    <tr><td colspan="2"> <h5><b>Ibu</b></h5></td></tr>
    <tr><td> Nama Ibu </td><td>: <b>{{$pendaftar->nama_ibu }}</b></td></tr>
    <tr><td> NIK Ibu </td><td>: <b>{{$pendaftar->nik_ibu }}</b></td></tr>
    <tr><td> Tahun Lahir Ibu </td><td>: <b>{{$pendaftar->tahun_lahir_ibu }}</b></td></tr>
    <tr><td> Status Ibu </td><td>: <b>{{$pendaftar->status_ibu }}</b></td></tr>
    <tr><td> Pekerjaan Ibu </td><td>: <b>{{$pendaftar->pekerjaan_ibu }}</b></td></tr>
    <tr><td> Penghasilan Ibu </td><td>: <b>{{$pendaftar->penghasilan_ibu }}</b></td></tr>
    <tr><td> Pendidikan Ibu </td><td>: <b>{{$pendaftar->pendidikan_ibu }}</b></td></tr>
    
    
    <tr><td colspan="2"> <h5><b>Wali</b></h5></td></tr>
    <tr><td> Nama Wali </td><td>: <b>{{$pendaftar->nama_wali }}</b></td></tr>
    <tr><td> NIK Wali </td><td>: <b>{{$pendaftar->nik_wali }}</b></td></tr>
    <tr><td> Tahun Lahir Wali </td><td>: <b>{{$pendaftar->tahun_lahir_wali }}</b></td></tr>
    <tr><td> Status Wali </td><td>: <b>{{$pendaftar->status_wali }}</b></td></tr>
    <tr><td> Pekerjaan Wali </td><td>: <b>{{$pendaftar->pekerjaan_wali }}</b></td></tr>
    <tr><td> Penghasilan Wali </td><td>: <b>{{$pendaftar->penghasilan_wali }}</b></td></tr>
    <tr><td> Pendidikan Wali </td><td>: <b>{{$pendaftar->pendidikan_wali }}</b></td></tr>
    <tr><td> Hp Wali </td><td>: <b>{{$pendaftar->hp_wali }}</b></td></tr>
    
    <tr><td colspan="2"> <h5><b>Kepemilikan Kartu</b></h5></td></tr>
    <tr><td> No KKS </td><td>: <b>{{$pendaftar->no_kks }}</b></td></tr>
    <tr><td> No PKH </td><td>: <b>{{$pendaftar->no_pkh }}</b></td></tr>
    <tr><td> No KIP </td><td>: <b>{{$pendaftar->no_kip }}</b></td></tr>

    <tr><td colspan="2"> <h4><b>Data Sekolah</b></h4></td></tr>

    <tr><td> Nama Sekolah </td><td>: <b>{{$pendaftar->nama_sekolah }}</b></td></tr>
    <tr><td> Jenjang Sekolah </td><td>: <b>{{$pendaftar->jenjang_sekolah }}</b></td></tr>
    <tr><td> Status Sekolah </td><td>: <b>{{$pendaftar->status_sekolah }}</b></td></tr>
    <tr><td> Lokasi Sekolah </td><td>: <b>{{$pendaftar->lokasi_sekolah }}</b></td></tr>
    <tr><td> Tahun Lulus </td><td>: <b>{{$pendaftar->tahun_lulus }}</b></td></tr>
    <tr><td> No UN </td><td>: <b>{{$pendaftar->no_un }}</b></td></tr>
    <tr><td> Prestasi </td><td>: <b>{{$pendaftar->prestasi }}</b></td></tr>

@endif
</table>
    <x-slot name="footer">
        <button type="button" class="btn btn-primary" @click="showDetail = false">
            <i class="fas fa-times-circle"></i> Tutup
        </button>
    </x-slot>    
</x-form-modal>
               