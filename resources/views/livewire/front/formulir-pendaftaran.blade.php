<div class="card">
@if($periode and $id_pendaftar==null and Carbon\Carbon::now()->isBefore($periode->tanggal_buka))
    <div class="card-body">
        <h3 class="text-muted">Penerimaan siswa baru belum dibuka</h3>
    </div>
@elseif($periode and $id_pendaftar==null and Carbon\Carbon::now()->isAfter($periode->tanggal_tutup))
    <div class="card-body">
        <h3 class="text-muted">Penerimaan siswa baru sudah ditutup</h3>
    </div>
@else

<form wire:submit.prevent="save">
    <div class="card-header d-flex text-white p-0">
        <x-step no="1" step="{{$step}}" label="Data Diri Pendaftar"></x-step>
        <x-step no="2" step="{{$step}}" label="Data Tempat Tinggal"></x-step>
        <x-step no="3" step="{{$step}}" label="Data Keluarga"></x-step>
        <x-step no="4" step="{{$step}}" label="Data Sekolah Asal"></x-step>
    </div>
    <div class="card-body">

<p class="alert alert-info">Semua kotak input wajib diisi, jika hendak dikosongkan dapat diisi "-".</p>
@if($step==0)
    <x-form-input field="nama" label="Nama" size="6"></x-form-input>
    <x-form-input type="number" field="nisn" label="NISN" size="4"></x-form-input>
    <x-form-input field="tempat_lahir" label="Tempat Lahir" size="4"></x-form-input>
    <x-form-datepicker field="tanggal_lahir" label="Tanggal Lahir" size="2"></x-form-datepicker>
    <x-form-select field="jenis_kelamin" label="Jenis Kelamin" size="2">
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </x-form-select>
    <x-form-input type="number" field="anak_ke" label="Anak Ke" size="2"></x-form-input>
    <x-form-input type="number" field="jumlah_saudara" label="Jumlah Saudara" size="2"></x-form-input>
    <x-form-select field="agama" label="Agama" size="3">
        <x-option-agama></x-option-agama>
    </x-form-select>
    <x-form-input field="hp" label="Hp" size="4"></x-form-input>
    <x-form-select field="hobi" label="Hobi" size="4">
        <x-option-hobi></x-option-hobi>
    </x-form-select>
    <x-form-select field="cita_cita" label="Cita Cita " size="4">
        <x-option-citacita></x-option-citacita>
    </x-form-select>
    <x-form-select field="id_jurusan" label="Jurusan" size="4">
        <option value="">Pilih Jurusan</option>
        @foreach($jurusan as $jur)
            <option value="{{$jur->id}}">{{$jur->nama_jurusan }} ({{$jur->singkatan}})</option>
        @endforeach
    </x-form-select>

@elseif($step==1)
    <x-form-select field="jenis_tempat_tinggal" label="Jenis Tempat Tinggal" size="6">
        <x-option-tempattinggal></x-option-tempattinggal>
    </x-form-select>
    <x-form-input field="alamat" label="Alamat" size="5"></x-form-input>
    <x-form-input field="desa" label="Desa" size="3"></x-form-input>
    <x-form-input field="kecamatan" label="Kecamatan" size="3"></x-form-input>
    <x-form-input field="kota" label="Kota" size="3"></x-form-input>
    <x-form-input field="propinsi" label="Propinsi" size="3"></x-form-input>
    <x-form-input field="rt" label="Rt" size="2"></x-form-input>
    <x-form-input field="rw" label="Rw" size="2"></x-form-input>
    <x-form-input field="kode_pos" label="Kode Pos" size="2"></x-form-input>
    <x-form-select field="jarak" label="Jarak" size="4">
        <x-option-jarak></x-option-jarak>
    </x-form-select>
    <x-form-select field="transportasi" label="Transportasi" size="4">
        <x-option-transportasi></x-option-transportasi>
    </x-form-select>

@elseif($step==2)
    <h5><b>Data Kepala Keluarga</b></h5><hr>
    <x-form-input type="number" field="no_kk" label="No KK" size="4"></x-form-input>
    <x-form-input field="nama_kk" label="Nama KK" size="6"></x-form-input>

    <h5><b>Data Ayah Kandung</b></h5><hr>
    <x-form-input field="nama_ayah" label="Nama Ayah" size="6"></x-form-input>
    <x-form-input type="number" field="nik_ayah" label="NIK Ayah" size="4"></x-form-input>
    <x-form-input type="number" field="tahun_lahir_ayah" label="Tahun Lahir Ayah" size="2"></x-form-input>
    <x-form-select field="status_ayah" label="Status Ayah" size="3">
        <x-option-status></x-option-status>
    </x-form-select>
    <x-form-select field="pekerjaan_ayah" label="Pekerjaan Ayah" size="5">
        <x-option-pekerjaan></x-option-pekerjaan>
    </x-form-select>
    <x-form-select field="penghasilan_ayah" label="Penghasilan Ayah" size="4">\
        <x-option-penghasilan></x-option-penghasilan>
    </x-form-select>
    <x-form-select field="pendidikan_ayah" label="Pendidikan Ayah" size="4">
        <x-option-pendidikan></x-option-pendidikan>
    </x-form-select>

    <h5><b>Data Ibu Kandung</b></h5><hr>
    <x-form-input field="nama_ibu" label="Nama Ibu" size="6"></x-form-input>
    <x-form-input type="number" field="nik_ibu" label="NIK Ibu" size="4"></x-form-input>
    <x-form-input type="number" field="tahun_lahir_ibu" label="Tahun Lahir Ibu" size="2"></x-form-input>
    <x-form-select field="status_ibu" label="Status Ibu" size="3">
        <x-option-status></x-option-status>
    </x-form-select>
    <x-form-select field="pekerjaan_ibu" label="Pekerjaan Ibu" size="5">
        <x-option-pekerjaan></x-option-pekerjaan>
    </x-form-select>
    <x-form-select field="penghasilan_ibu" label="Penghasilan Ibu" size="4">\
        <x-option-penghasilan></x-option-penghasilan>
    </x-form-select>
    <x-form-select field="pendidikan_ibu" label="Pendidikan Ibu" size="4">
        <x-option-pendidikan></x-option-pendidikan>
    </x-form-select>
    
    <h5><b>Data Wali</b></h5><hr>
    <p class="alert alert-info">Diisi hanya jika tinggal dengan wali.</p>
    <x-form-input field="nama_wali" label="Nama Wali" size="6"></x-form-input>
    <x-form-input type="number" field="nik_wali" label="Nik Wali" size="4"></x-form-input>
    <x-form-input type="number" field="tahun_lahir_wali" label="Tahun Lahir Wali" size="2"></x-form-input>
    <x-form-select field="status_wali" label="Status Wali" size="3">
        <x-option-status></x-option-status>
    </x-form-select>
    <x-form-select field="pekerjaan_wali" label="Pekerjaan Wali" size="5">
        <x-option-pekerjaan></x-option-pekerjaan>
    </x-form-select>
    <x-form-select field="penghasilan_wali" label="Penghasilan Wali" size="4">
        <x-option-penghasilan></x-option-penghasilan>
    </x-form-select>
    <x-form-select field="pendidikan_wali" label="Pendidikan Wali" size="4">
        <x-option-pendidikan></x-option-pendidikan>
    </x-form-select>
    <x-form-input field="hp_wali" label="Hp Wali" size="4"></x-form-input>

    
    <h5><b>Data Kepemilikan Kartu</b></h5><hr>
    
    <p class="alert alert-info">Jika tidak punya boleh dikosongkan.</p>
    <x-form-input type="number" field="no_kks" label="No KKS" size="4"></x-form-input>
    <x-form-input type="number" field="no_kip" label="No KIP" size="4"></x-form-input>
    <x-form-input type="number" field="no_pkh" label="No PKH" size="4"></x-form-input>

@elseif($step==3)
    <x-form-input field="nama_sekolah" label="Nama Sekolah" size="6"></x-form-input>
    <x-form-select field="jenjang_sekolah" label="Jenjang Sekolah" size="3">
        <x-option-jenjang></x-option-jenjang>
    </x-form-select>
    <x-form-select field="status_sekolah" label="Status Sekolah" size="3">
        <x-option-status-sekolah></x-option-status-sekolah>
    </x-form-select>
    <x-form-select field="lokasi_sekolah" label="Lokasi Sekolah" size="3">
        <x-option-lokasi-sekolah></x-option-lokasi-sekolah>
    </x-form-select>
    <x-form-input type="number" field="tahun_lulus" label="Tahun Lulus" size="2"></x-form-input>
    <x-form-input type="number" field="no_un" label="No Un" size="4"></x-form-input>
    <x-form-input field="prestasi" label="Prestasi" size="6"></x-form-input>
@endif

    </div>
    <div class="card-footer d-flex justify-content-between">
        @if($step>0)
        <a class="btn btn-primary text-white" wire:click="prevStep()"> 
            <i class="fas fa-chevron-left"></i> Sebelumnya
        </a>
        @else
            <div></div>
        @endif

        <button class="btn btn-primary text-white" type="submit"> 
            Simpan             
            @if($step<3) dan Lanjutkan 
            @else dan Selesai
            @endif 
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
</form>

    <x-toast></x-toast>
@endif
</div>
