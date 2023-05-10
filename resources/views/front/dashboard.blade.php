<x-front-layout>
<div class="container mt-4">
    <div class="card">
        <div class="card-body">

    <div class="row">
        <!-- menampilkan widget dengan posisi samping -->
        <div class="col-md-4 sidebar-widget">
            <x-front-widget posisi="Samping"></x-front-widgt>
        </div>

        <div class="col-md-8">
            <h5 class="page-title">Dashboard User</h5>

<table class="mb-3">
    <tr><td>No. Pendaftar</td><td>:</td><td><b>{{$pendaftar->periode->tahun.(substr('0000'.$pendaftar->no_pendaftar,-4))}}</b></td></tr>
    <tr><td>Nama</td><td>:</td><td> {{$pendaftar->nama}}</td></tr>
    <tr><td>NISN</td><td>:</td><td> {{$pendaftar->nisn}}</td></tr>
    <tr><td>Tempat/Tanggal Lahir</td><td>:</td><td> {{$pendaftar->tempat_lahir}}, {{Carbon\Carbon::parse($pendaftar->tanggal_lahir)->isoFormat('D MMMM Y')}}</td></tr>
    <tr><td>Jenis Kelamin</td><td>:</td><td> @if($pendaftar->jenis_kelamin=='L') Laki-laki @else Perempuan @endif</td></tr>
    <tr><td valign="top">Alamat</td><td>:</td>
        <td> 
            {{$pendaftar->alamat}} <br>
            Desa: {{$pendaftar->desa}} RT: {{$pendaftar->rt}} RT: {{$pendaftar->rw}} <br>
            Kec: {{$pendaftar->kecamatan}} Kab./Kota: {{$pendaftar->kota}}<br>
            Prov.: {{$pendaftar->propinsi}} Kode pos: {{$pendaftar->kode_pos}}<br>
        </td>
    </tr>
    <tr><td>Agama</td><td>:</td><td> {{$pendaftar->agama}}</td></tr>
    <tr><td>Pilihan Jurusan</td><td>:</td><td> {{$pendaftar->jurusan->nama_jurusan}}</td></tr>
    <tr><td>Tanggal Daftar</td><td>:</td><td> {{ $pendaftar->created_at->isoFormat('dddd, D MMMM Y') }}</td></tr>
    <tr><td>Hasil Seleksi</td><td>:</td><td><b> {{ strtoupper($pendaftar->status_seleksi) }} </b></td></tr>
</table>

<a href="/cetak-formulir" class="btn btn-primary me-2 text-white">
    <i class="fas fa-print"></i> Cetak Formulir
</a>
<a href="/pendaftaran" class="btn btn-primary me-2 text-white">
    <i class="fas fa-edit"></i> Edit Formulir
</a>

        </div>
    </div>

        </div>
    </div>
</div>

<!-- menampilkan widget dg posisi bawah -->
<x-slot name="footer">
    <x-front-widget posisi="Bawah"></x-front-widget>
</x-slot>
</x-front-layout>
