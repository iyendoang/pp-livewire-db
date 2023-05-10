<x-front-layout>
<div class="container mt-4">
    <div class="card">
        <div class="card-body">

    <div class="row">
        <!-- menampilkan widget dengan posisi samping -->
        <div class="col-md-4 sidebar-widget">
            <x-front-widget posisi="Samping"></x-front-widgt>
        </div>

        <!-- menampilkan deskripsi jurusan pada bagian samping -->
        <div class="col-md-8">
            <h5 class="page-title">{{$jurusan->nama_jurusan}}</h5>

            {!! $jurusan->deskripsi !!}
                
        </div>
    </div>

        </div>
    </div>
</div>

<!-- menampilkan widget dengan posisi bawah -->
<x-slot name="footer">
    <x-front-widget posisi="Bawah"></x-front-widget>
</x-slot>
</x-front-layout>
