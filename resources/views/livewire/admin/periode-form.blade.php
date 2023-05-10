<x-form-modal>
    <x-slot name="header">
        @if($id_periode) Edit Periode
        @else Tambah Periode
        @endif
    </x-slot>

    <x-form-input field="tahun" label="Tahun" size="3"></x-form-input>                          
    <x-form-datepicker field="tanggal_buka" label="Tanggal Buka" size="4"></x-form-datepicker>            
    <x-form-datepicker field="tanggal_tutup" label="Tanggal Tutup" size="4"></x-form-datepicker>            
    <x-form-select field="aktif" label="aktif" size="2">
        <option value="Y">Ya</option>
        <option value="N">Tidak</option>
    </x-select>            
            
    <x-slot name="footer">
        <x-form-button></x-form-button>
    </x-slot>    
</x-form-modal>
               