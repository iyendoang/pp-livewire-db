<x-page-index>

    <!-- Tombol tambah -->
    <x-slot name="page_button">
        <button class="btn btn-success" @click="showModal = true">
            <i class="fas fa-plus-circle"></i> Tambah
        </button>
    </x-slot>

    <!-- pilihan jumlah tampil data dan form pencarian -->
    <x-slot name="table_tool">
        <x-table-tool></x-tbtool>
    </x-slot>

    <!-- header tabel -->
    <x-slot name="table_column">
        <th><x-table-header field="tahun" sortField="{{$sortField}}" sortAsc="{{$sortAsc}}">Tahun</x-tbheader></th> 
        <th><x-table-header field="tanggal_buka" sortField="{{$sortField}}" sortAsc="{{$sortAsc}}">Tanggal Buka</x-tbheader></th>                                                  
        <th><x-table-header field="tanggal_tutup" sortField="{{$sortField}}" sortAsc="{{$sortAsc}}">Tanggal Tutup</x-tbheader></th>                                                  
        <th><x-table-header field="aktif" sortField="{{$sortField}}" sortAsc="{{$sortAsc}}">Aktif</x-tbheader></th>                                                  
    </x-slot>

    <!-- Data pada body tabel -->
    @forelse ($periode as $data)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><x-table-input iddata="{{$data->id}}" field="'tahun'"> {{ $data->tahun}}</x-table-input></td>
            <td><x-table-input iddata="{{$data->id}}" field="'tanggal_buka'"> {{Carbon\Carbon::parse($data->tanggal_buka)->isoFormat('D MMMM Y')}}</x-table-input></td>
            <td><x-table-input iddata="{{$data->id}}" field="'tanggal_tutup'"> {{Carbon\Carbon::parse($data->tanggal_tutup)->isoFormat('D MMMM Y')}}</x-table-input></td>
            <td class="text-center">
                @if($data->aktif=="Y")
                    <i class="fas fa-check-circle text-success"></i>
                @else
                    <a href="#" wire:click.prevent="setActive({{$data->id}})"><i class="fas fa-times-circle text-danger"></i></a>
                @endif
            </td>
            <td>
                <x-table-action form="admin.periode-form" iddata="{{$data->id}}"></x-tbction>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6">Tidak ada data untuk ditampilkan</td>
        </tr>
    @endforelse

    <!-- Link paginasi -->
    <x-slot name="table_page">
    {{ $periode->links('pagination::bootstrap-4') }}
    </x-slot>            
            
    <!-- Menerapkan livewire untuk tampilan form -->
    <x-slot name="page_form">
        <livewire:admin.periode-form>
    </x-slot> 

    <!-- Dialog hapus data-->
    <x-slot name="dialog">
        @if($id_delete)
            <x-dialog></x-dialog>
        @endif
    </x-slot> 
    
</x-page-index>