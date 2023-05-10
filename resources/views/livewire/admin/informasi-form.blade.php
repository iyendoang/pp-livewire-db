<x-form-modal>
    <x-slot name="header">
        @if($id_informasi) Edit Informasi
        @else Tambah Informasi
        @endif
    </x-slot>

    <x-form-input field="judul" label="Judul" size="6"></x-form-input>                          
    <x-form-editor field="konten" label="Konten"></x-form-editor>  
    <x-form-select field="tampil_beranda" label="Tampilkan di Beranda" size="2">
        <option value="Y">Ya</option>
        <option value="N">Tidak</option>
    </x-select>  

    <x-slot name="footer">
        <x-form-button></x-form-button>
    </x-slot>   
</x-form-modal>
               