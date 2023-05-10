<!-- digunakan untuk membuat card pada dashboard admin -->
<div class="col-md-3 col-sm-6 mb-3">
    <div class="card {{$color}}">
        <div class="card-body d-flex">
            <i class="{{$icon}} text-white" style="font-size: 80px"></i>
            <div class="text-white ps-3">
                <h1><b>{{$data}}</b></h1>
                <h5>{{$slot}}</h5>
            </div>
        </div>
    </div>
</div>