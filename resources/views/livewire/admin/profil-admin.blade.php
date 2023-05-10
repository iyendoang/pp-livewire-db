<div class="card">  
    <form wire:submit.prevent="save">

    <div class="card-body">        
        <x-form-input field="name" label="Nama User" size="6"></x-form-input>
        <x-form-input field="email" label="Email" size="4"></x-form-input>
        <x-form-input type="password" field="password" label="Ubah Password" size="4"></x-form-input>
        <x-form-input type="password" field="confirm_password" label="Konfirmasi Password" size="4"></x-form-input>
    </div>

    <div class="card-footer">
        <button class="btn btn-primary" type="submit"> 
            <i class="fas fa-save"></i> Simpan Perubahan
        </button>        
    </div>

    </form>
</div>
<x-toast></x-toast>