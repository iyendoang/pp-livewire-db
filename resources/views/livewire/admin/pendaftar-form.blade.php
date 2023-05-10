<x-form-modal>
    <x-slot name="header">
        Edit Status Seleksi
    </x-slot>

    <x-form-select field="status_seleksi" label="Status Seleksi"> 
        <option value="Belum Dikonfirmasi">Belum Dikonfirmasi</option>
        <option value="Dikonfirmasi">Dikonfirmasi</option>
        <option value="Diterima">Diterima</option>
        <option value="Ditolak">Ditolak</option>
    </x-form-select>        
    @error('selected_data') <small class="text-danger">{{ $message }}</small> @enderror

    <x-slot name="footer">
        <x-form-button></x-form-button>
    </x-slot>    
</x-form-modal>
               