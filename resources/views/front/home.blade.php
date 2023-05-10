<x-front-layout>

<!-- slideshow gambar -->
<div class="bg-dark pt-3 pb-2">
    <div class="container">
        <div  x-data x-init="new Splide($refs.splide, {
        type: 'loop',
        height : 'calc(100vh - 220px)',   
        cover: true,   
        autoplay : true,   
        }).mount();">
            <div class="splide" x-ref="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach($slide as $s)                     
                            <li class="splide__slide" style="text-shadow: 0 0 5px #000">
                                <img src="/storage/slide/{{$s->gambar}}" alt="">
                                <h1 class="text-center text-white" style="margin-top: calc(50vh - 150px); font-size: 50px">{{$s->judul}}</h1>
                                <div class="text-center text-white d-none d-md-block"> 
                                    <h5 style="padding: 0 100px">{{$s->deskripsi}}</h5>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- menampilkan status dibukanya pendaftaran-->
<div class="bg-secondary">
    <div class="container">
        <div class="row pt-4 pb-4">
            <div class="col-md-12 text-white text-center">
        @if($periode and Carbon\Carbon::now()->isBetween($periode->tanggal_buka, $periode->tanggal_tutup))
            <h3>Pendaftaran peserta didik baru telah dibuka</h3>
            
            <a href="/register" class="btn btn-primary mb-2">
               <i class="fas fa-edit"></i> Daftar Sekarang
            </a>           
        @elseif($periode and Carbon\Carbon::now()->isAfter($periode->tanggal_buka))
            <h3>Pendaftaran peserta didik baru telah ditutup</h3>
        @else
            <h3>Pendaftaran peserta didik baru belum dibuka</h3>            
        @endif
            
            <span id="informasi"></span>
            <a @click="document.getElementById('informasi').scrollIntoView()" class="btn btn-primary mb-2">
               <i class="fas fa-info-circle"></i> Informasi Pendaftaran
            </a>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4" >
    <div class="card">
        <div class="card-body">

    <div class="row">
        <!-- menampilkan widget dengan posisi samping -->
        <div class="col-md-4 sidebar-widget">
            <x-front-widget posisi="Samping"></x-front-widgt>
        </div>

        <!-- menampilkan informasi pada bagian konten -->
        <div class="col-md-8">
            @foreach($informasi as $i)
                <h5 class="page-title">{{$i->judul}}</h5>
                
                {!! $i->konten !!}
                
            @endforeach
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
