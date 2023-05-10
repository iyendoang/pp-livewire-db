<!-- digunakan untuk membuat tombol aksi pada tabel -->
<div>
    {{ $slot }}
<button wire:click="$emitTo('{{$form}}', 'editData', {{ $iddata }})" class="btn btn-sm btn-primary mb-1 text-white"
    style="width:30px; height:30px; border-radius: 50%; padding: 5px;"
>
    <i class="fas fa-edit"></i>
</button>
<button wire:click="openConfirm({{ $iddata }})" class="btn btn-sm btn-danger mb-1 text-white"
    style="width:30px; height:30px; border-radius: 50%; padding: 5px;"
>                                
    <i class="fas fa-times"></i>
</button>
</div>