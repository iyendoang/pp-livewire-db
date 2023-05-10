<div class="modal d-block" style="background: rgba(0,0,0, 0.8)" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form wire:submit.prevent="save">

            <!-- Header modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">
                    {{ $header }}
                </h5>
                @isset($close)
                    {{ $close }}
                @endisset
            </div>

            <!-- body modal -->
            <div class="modal-body">
                <div style="max-height: calc(100vh - 220px); overflow-y: auto; overflow-x: hidden;">
                {{ $slot }}           
                </div>
            </div>

            <!-- footer modal -->
            <div class="modal-footer">
                {{ $footer }}
            </div>
        
            </form>
        </div>
    </div>
</div>
               