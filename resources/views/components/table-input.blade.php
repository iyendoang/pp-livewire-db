<!-- digunakan untuk menampilkan data yang dapat diklik untuk mengedit pada tabel -->
<div x-data="{ 'isEdit' : false }">
    <div width="100%" x-on:show-edit.window=
        "if({{$iddata}} == $event.detail.id && {{$field}} == $event.detail.field) isEdit = true;"
    >
        <div x-show="isEdit==false">
            <a href="#" wire:click.prevent="setEdit({{$iddata}}, {{$field}})" style="text-decoration: none; color: #212529;">
                {{$slot}}
            </a>
        </div>
        <div x-show="isEdit" x-cloak>
            <form class="d-flex" wire:submit.prevent="saveEdit">
                <div class="flex-grow-1"> 
                    <input @click.away="isEdit=false" class="form-control" x-ref="forminput" type="text" wire:model.lazy="data_edit">
                </div>
                <div> 
                    <button class="btn" type="submit"><i class="fas fa-check"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>