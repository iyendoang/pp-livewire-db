<x-page-index>

    <x-slot name="page_button">
        <button class="btn btn-primary" wire:click="$emitTo('admin.pendaftar-form', 'editData', '{{ json_encode($selectedData) }}' )">
            <i class="fas fa-edit"></i> Edit Status Seleksi
        </button>
        <button class="btn btn-success" wire:click="downloadExcel">
            <i class="fas fa-file-excel"></i> Export Excel
        </button>
    </x-slot>

    <x-slot name="table_tool">
        <x-table-tool></x-tbtool>
    </x-slot>

    <x-slot name="table_checkbox">
        <input type="checkbox" class="form-check-input" wire:model="selectAll">
    </x-slot>

    <x-slot name="table_column">
        <th><x-table-header field="no_pendaftar" sortField="{{$sortField}}" :sortAsc="$sortAsc">No. Pendaftar</x-tbheader></th> 
        <th><x-table-header field="created_at" sortField="{{$sortField}}" :sortAsc="$sortAsc">Tgl. Daftar</x-tbheader></th> 
        <th><x-table-header field="nama" sortField="{{$sortField}}" :sortAsc="$sortAsc">Nama Pendaftar</x-tbheader></th> 
        <th><x-table-header field="jenis_kelamin" sortField="{{$sortField}}" :sortAsc="$sortAsc">Jenis Kelamin</x-tbheader></th>                                                  
        <th><x-table-header field="nama_sekolah" sortField="{{$sortField}}" :sortAsc="$sortAsc">Asal Sekolah</x-tbheader></th>                                                  
        <th><x-table-header field="jurusan" sortField="{{$sortField}}" :sortAsc="$sortAsc">Jurusan</x-tbheader></th>                                                  
        <th><x-table-header field="status_seleksi" sortField="{{$sortField}}" :sortAsc="$sortAsc">Status Seleksi</x-tbheader></th>                                                  
    </x-slot>

    @forelse ($pendaftar as $data)
        <tr>
            <td><input type="checkbox" class="form-check-input" wire:model="selectedData" value="{{$data->id}}"></td>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->periode->tahun.substr('0000'.$data->no_pendaftar,-4)}}</td>
            <td>{{ $data->created_at->isoFormat('dddd, D MMMM Y')}}</td>
            <td>{{ $data->nama}}</td>
            <td>{{ $data->jenis_kelamin}}</td>
            <td>{{ $data->nama_sekolah}}</td>
            <td>{{ $data->id_jurusan}}</td>
            <td>   
                <x-table-select iddata="{{$data->id}}" field="'status_seleksi'" data="{{ $data->status_seleksi}}"> 
                    <option value="Belum Dikonfirmasi">Belum Dikonfirmasi</option>
                    <option value="Dikonfirmasi">Dikonfirmasi</option>
                    <option value="Diterima">Diterima</option>
                    <option value="Ditolak">Ditolak</option>
                </x-table-select>
            </td>
            <td align="center">
                <button wire:click="$emitTo('admin.pendaftar-detail', 'showData', {{ $data->id }})" 
                        class="btn btn-sm btn-success mb-1 text-white"
                        style="width:30px; height:30px; border-radius: 50%; padding: 5px;"
                    ><i class="fas fa-plus-circle"></i>
                </button>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="11">Tidak ada data untuk ditampilkan</td>
        </tr>
    @endforelse

    <x-slot name="table_page">
    {{ $pendaftar->links('pagination::bootstrap-4') }}
    </x-slot>            
            
    <x-slot name="page_form">
        <livewire:admin.pendaftar-form>
    </x-slot> 

    <x-slot name="dialog">
        @if($id_delete)
            <x-dialog></x-dialog>
        @endif

        <div x-data="{ 'showDetail' : false}"
            x-on:detail-ready.window="showDetail = true"
        >
            <div x-show.transition="showDetail" x-cloak>
                <livewire:admin.pendaftar-detail>
            </div>
        </div> 
    </x-slot> 
    
</x-page-index>