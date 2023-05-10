<!-- digunakan untuk membuat menu link -->
<li class="nav-item" :class="{'active': '{!! request()->routeIs($route) !!}' }">
    <a class="nav-link link-primary" href="{{route($route)}}">
        @isset($icon)
            <i class="icon {{$icon}}"></i>
        @endisset
        <span>{{$slot}}</span>
    </a>
</li>