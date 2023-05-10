<!-- digunakan untuk membuat flash message ketika berhasil simpan, update dan delete -->
<div x-data="{'showToast' : false, 'toastMsg' : ''}" x-cloak class="position-fixed top-0 end-0 w-100" style="z-index:1030">
    <div x-on:show-message.window="
        showToast = true; 
        toastMsg = $event.detail.msg;
        setTimeout(() => showToast = false, 2000);"
    >
        <div  x-show.transition.duration.200ms="showToast" class="toast-container position-absolute top-0 end-0 p-3" style="z-index: 1050">  
            <div class="toast show" role="alert">
                <div class="toast-header">
                    <strong class="me-auto">Berhasil</strong>
                    <button type="button" class="btn-close" @click="showToast = false"></button>
                </div>
                <div class="toast-body">
                    <p x-text="toastMsg"></p>

                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>