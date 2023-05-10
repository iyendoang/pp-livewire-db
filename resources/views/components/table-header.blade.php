<!-- digunakan untuk membuat judul kolom yang dapat diklik untuk mengurutkan data -->
<a wire:click.prevent="sortBy('{{$field}}')" href="#" style="text-decoration: none; color: #212529;">
    
    <div class="float-start">{{ $slot }}</div>

    <div class="float-end">
    @if ($sortField !== $field)
        <i class="text-muted fas fa-sort"></i>
    @elseif ($sortAsc)
        <i class="fas fa-sort-up"></i>
    @else
        <i class="fas fa-sort-down"></i>
    @endif
    </div>
</a>