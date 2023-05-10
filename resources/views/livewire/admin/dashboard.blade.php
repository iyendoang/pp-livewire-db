
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $chart->script() !!} 
@endpush

<div>
    <div class="row mt-4">
        <!-- menggunakan komponen components/dashboaard-card.blade.php -->
        <x-dashboard-card 
            color="bg-info" 
            icon="fas fa-edit"      
            data="{{$blmdikonfirmasi}}">  
            Blm. Dikonfirm     
        </x-dashboard-card>

        <x-dashboard-card 
            color="bg-success" 
            icon="fas fa-check-circle"    
            data="{{$diterima}}">  
            Diterima            
        </x-dashboard-card>

        <x-dashboard-card 
            color="bg-danger" 
            icon="fas fa-times-circle"    
            data="{{$ditolak}}">  
            Ditolak              
        </x-dashboard-card>

        <x-dashboard-card 
            color="bg-primary" 
            icon="fas fa-user"    
            data="{{$pendaftar}}">  
            Total Pendaftar           
        </x-dashboard-card>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <h4>Grafik Pendaftar Per Jurusan</h4>
        </div>
        <div class="card-body">
            <!-- generate cart -->
            {!! $chart->container() !!}
        </div>
    </div>
</div>

