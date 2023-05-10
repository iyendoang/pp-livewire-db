<x-front-layout>
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            
    <div class="row">
        <div class="col-md-12">
            
            <h5 class="page-title">Cetak Formulir</h5>
        
            <!-- iframe untuk menampilkan PDF -->
            <iframe style="
                width: 100%;
                height: calc(100vh - 230px);
            " src="/formulir-pdf" id="frame"></iframe>

            <a href="/dashboard" class="btn btn-secondary text-white float-start">
                <i class="fas fa-chevron-left"></i> Kembali
            </a>
            <!-- membuat tombol yang dapat print dokumen pada iframe -->
            <a class="btn btn-primary text-white float-end" onclick="
                frame = document.getElementById('frame').contentWindow;
                frame.focus();
                frame.print();"
            >
                <i class="fas fa-print"></i> Cetak
            </a>
               
        </div>
    </div>

        </div>
    </div>
</div>

<x-slot name="footer">
    <x-front-widget posisi="Bawah"></x-front-widget>
</x-slot>
</x-front-layout>
