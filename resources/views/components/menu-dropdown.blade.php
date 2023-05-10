<!-- digunakan untuk menu dropdown -->
@props(['posisi'=>'samping', 'icon', 'label'])
<li class="nav-item dropdown" x-data="{ 'menuOpen' : false}">
    <a style="cursor: pointer" class="nav-link link-primary" @click="menuOpen = !menuOpen">
        @isset($icon)
            <i class="icon {{$icon}}"></i>
        @endisset
        <span class="label">{{$label}}</span>

        @if($posisi=="samping") <span x-show="menuOpen==false"><i  class="float-end fas fa-angle-right"></i></span>
        @else <span x-show="menuOpen==false"><i  class="float-end fas fa-angle-down"></i></span>
        @endif

        <span x-cloak x-show="menuOpen"><i  class="float-end fas fa-angle-down"></i></span>
    </a>
    <ul class="collapse show" x-show.transition.200ms="menuOpen" x-cloak>
        {{$slot}}
    </ul>
</li>