<x-form-modal>
    <x-slot name="header">
        @if($id_jurusan) Edit Jurusan
        @else Tambah Jurusan
        @endif
    </x-slot>

    <x-form-input field="nama_jurusan" label="Nama Jurusan" size="6"></x-form-input>                
    <x-form-input field="singkatan" label="Singkatan" size="4"></x-form-input>                         
    <x-form-editor field="deskripsi" label="Deskripsi"></x-form-editor>          
            
    <x-slot name="footer">
        <x-form-button></x-form-button>
    </x-slot>    
</x-form-modal>
               