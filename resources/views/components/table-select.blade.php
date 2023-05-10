<!-- digunakan untuk menampilkan yang dapat diklik untuk mengedit dengan select box -->
<div x-data="{ 'isEdit' : false }">
    <div width="100%" x-on:show-edit.window=
        "if({{$iddata}} == $event.detail.id && {{$field}} == $event.detail.field) isEdit = true;"
    >
        <div x-show="isEdit==false">
            <a href="#" wire:click.prevent="setEdit({{$iddata}}, {{$field}})" style="text-decoration: none; color: #212529;">
                {{$data}}
            </a>
        </div>
        <div x-show="isEdit" x-cloak>
            <form class="d-flex">
                <div class="flex-grow-1"> 
                    <select @click.away="isEdit=false" x-on:change="isEdit=false" class="form-select" x-ref="forminput" type="text" wire:model.lazy="data_edit">
                        {{$slot}}
                    </select>
                </div>
            </form>
        </div>
    </div>
</div>