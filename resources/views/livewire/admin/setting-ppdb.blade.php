<div class="card">  
    <form wire:submit.prevent="save">

    <div class="card-body">        
        <x-form-input field="nama_sekolah" label="Nama Sekolah" size="6"></x-form-input>
        <x-form-input field="alamat_sekolah" label="Alamat Sekolah" size="6"></x-form-input>
        <x-form-input field="email_sekolah" label="Email Sekolah" size="4"></x-form-input>
        <x-form-input field="telp_sekolah" label="Telpon Sekolah" size="4"></x-form-input>
        <x-form-input type="file" field="logo" label="Logo Sekolah" size="4">
            @if ($logo)
                <br>Preview Gambar:<br>
                <img src="{{ $logo->temporaryUrl() }}" width="100">    
            @else
                @if($logo_sekolah) 
                    <br>Preview Gambar:<br>
                    <img src="/images/logo.png" width="100">
                @endif
            @endif
        <div class="mt-2 alert alert-info">Gambar harus format PNG maksimal 2MB</div>
        </x-form-input>  
        <x-form-input type="file" field="judul" label="Judul Header" size="4">
            @if ($judul)
                <br>Preview Gambar:<br>
                <img src="{{ $judul->temporaryUrl() }}" width="300">    
            @else
                @if($judul_header) 
                    <br>Preview Gambar:<br>
                    <img src="/images/judul.png" width="100">
                @endif
            @endif
            <div class="mt-2 alert alert-info">Gambar harus format PNG maksimal 2MB, ukuran yang disarankan 300x70 pixel.</div>
        </x-form-input> 
    </div>

    <div class="card-footer">
        <button class="btn btn-primary" type="submit"> 
            <i class="fas fa-save"></i> Simpan Perubahan
        </button>        
    </div>

    </form>
</div>
<x-toast></x-toast>