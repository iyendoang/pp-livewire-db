<!-- digunakan untuk membuat dropdown pilihan tampilan data tabel dan form pencarian -->
<div class="row mb-2">
    <div class="col-md-2 col-sm-6 d-flex mb-2">
        <div class="p-2">Tampil</div>
        <div class="flex-grow-1">
            <select class="form-select"
                wire:model="perPage"
            >
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
        <div class="p-2">data</div>

    </div>

    <div class="col-md-7">
        {{ $slot }}
    </div>
    
    <div class="col-md-3 d-flex">
        <div class="p-2">Cari</div>
        <div class="flex-grow-1">
            <input class="form-control" type="text" placeholder="Cari di sini..."
                wire:model.debounce.800ms="search"
            >
        </div>
    </div>
</div>