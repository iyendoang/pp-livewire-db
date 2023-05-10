<!-- digunakan untuk membuat dialog konfirmasi hapus data -->
<div class="modal d-block" style="background: rgba(0,0,0, 0.2)" tabindex="-1" x-cloak>
    <div class="modal-dialog shadow-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Konfirmasi</h5>
            </div>

            <div class="modal-body">
                Yakin akan menghapus data?            
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary text-white" wire:click="closeConfirm()">Batal</button>
                <button class="btn btn-sm btn-danger" type="submit" wire:click="delete()">Yakin</button>
            </div>
        </div>
    </div>
</div>
               