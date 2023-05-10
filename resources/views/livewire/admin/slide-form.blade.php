<x-form-modal>
    <x-slot name="header">
        @if($id_slide) Edit Slide
        @else Tambah Slide
        @endif
    </x-slot>

    <x-form-input type="file" field="file" label="Gambar" size="9">
        @if ($file)
            <br>Preview Gambar:<br>
            <img src="{{ $file->temporaryUrl() }}" width="300">    
        @else
            @if($gambar) 
                <br>Preview Gambar:<br>
                <img src="/storage/slide/{{ $gambar }}" width="300">
            @endif
        @endif
    </x-form-input>  
    <x-form-input field="judul" label="Judul" size="6"></x-form-input>                          
    <x-form-textarea field="deskripsi" label="Deskripsi"></x-form-textarea>  

    <x-slot name="footer">
        <x-form-button></x-form-button>
    </x-slot>   
</x-form-modal>
               