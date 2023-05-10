<!-- digunakan untuk membuat judul tahapan pada form pendaftaran -->
<div class="step d-flex p-3 ps-4 
    @if($step + 1 >= $no) bg-primary @else bg-secondary @endif
    " style="width: 25%">
    <div class="me-3">
        <h1 style="
            width: 50px; 
            height: 50px; 
            background: #fff;
            line-height: 50px;
        " class=" text-center rounded-circle
            @if($step + 1 >= $no) text-primary @else text-secondary @endif
        ">{{$no}}</h1>
    </div>
    <h4>{{$label}}</h4>
</div>
