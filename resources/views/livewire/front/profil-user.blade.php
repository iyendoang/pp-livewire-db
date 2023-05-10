<div>  
    <form wire:submit.prevent="save">
    
    <x-form-input field="name" label="Nama User" size="6"></x-form-input>
    <x-form-input field="email" label="Email" size="4"></x-form-input>
    <x-form-input type="password" field="password" label="Ubah Password" size="4"></x-form-input>
    <x-form-input type="password" field="confirm_password" label="Konfirmasi Password" size="4"></x-form-input>

    <button class="btn btn-primary mt-4" type="submit"> 
        <i class="fas fa-save"></i> Simpan Perubahan
    </button>
    
    </form>
    <x-toast></x-toast>
</div>