<x-page-index>

    <x-slot name="page_button">
        <button class="btn btn-success" @click="showModal = true">
            <i class="fas fa-plus-circle"></i> Tambah
        </button>
    </x-slot>

    <x-slot name="table_tool">
        <x-table-tool></x-tbtool>
    </x-slot>

    <x-slot name="table_column">
        <th><x-table-header field="judul" sortField="{{$sortField}}" sortAsc="{{$sortAsc}}">Judul</x-tbheader></th> 
        <th><x-table-header field="konten" sortField="{{$sortField}}" sortAsc="{{$sortAsc}}">Konten</x-tbheader></th>                                                  
        <th><x-table-header field="posisi" sortField="{{$sortField}}" sortAsc="{{$sortAsc}}">Posisi</x-tbheader></th>                                                  
        <th width="80"><x-table-header field="urut" sortField="{{$sortField}}" sortAsc="{{$sortAsc}}">Urut</x-tbheader></th>                                                  
    </x-slot>

    @forelse ($widget as $data)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><x-table-input iddata="{{$data->id}}" field="'judul'"> {{ $data->judul}}</x-table-input></td>
            <td>{{ $data->konten}}</td>
            <td>
                <x-table-select iddata="{{$data->id}}" field="'posisi'" data="{{ $data->posisi}}"> 
                    <option value="Bawah">Bawah</option>
                    <option value="Samping">Samping</option>
                </x-table-select>
            </td>
            <td class="text-center">
                @if($data->urut != $max)
                    <a href="#" wire:click.prevent="sortUp({{$data->id}})">
                        <i class="fas fa-arrow-alt-circle-down text-success"></i>
                    </a>
                @endif

                @if($data->urut != $min)
                    <a href="#" wire:click.prevent="sortDown({{$data->id}})">
                        <i class="fas fa-arrow-alt-circle-up text-primary"></i>
                    </a>
                @endif
            </td>
            <td>
                <x-table-action form="admin.widget-form" iddata="{{$data->id}}"></x-tbction>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6">Tidak ada data untuk ditampilkan</td>
        </tr>
    @endforelse

    <x-slot name="table_page">
    {{ $widget->links('pagination::bootstrap-4') }}
    </x-slot>            
            
    <x-slot name="page_form">
        <livewire:admin.widget-form>
    </x-slot> 

    <x-slot name="dialog">
        @if($id_delete)
            <x-dialog></x-dialog>
        @endif
    </x-slot> 
    
</x-page-index>