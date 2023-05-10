<x-form-modal>
    <x-slot name="header">
        @if($id_widget) Edit Widget
        @else Tambah Widget
        @endif
    </x-slot>

    <x-form-input field="judul" label="Judul" size="6"></x-form-input>                          
    <x-form-textarea field="konten" label="Konten"></x-form-textarea>  
    <x-form-select field="posisi" label="posisi" size="2">
        <option value="Bawah">Bawah</option>
        <option value="Samping">Samping</option>
    </x-select> 

    <x-slot name="footer">
        <x-form-button></x-form-button>
    </x-slot>   
</x-form-modal>
               