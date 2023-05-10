<div class="container-fluid" x-data="{ 'showModal' : false }">

<!-- sembunyikan modal jika ada event show-message dan tampilkan jika ada event edit-ready -->
<div class="card"
    x-on:show-message.window="showModal = false"
    x-on:edit-ready.window="showModal = true"
>
    <!-- tempat menampilkan tombol halaman seperti tambah data dan sebagainya -->
    <div class="card-header">
        <div class="col-md-12">
            <div class="float-end">
                {{ $page_button }}
            </div>
        </div>
    </div>

    <div class="card-body">  
        <!-- tempat menampilkan pilihan jml tampil halaman dan form pencarian -->        
        {{ $table_tool }} 

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">

            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <!-- tempat menampilkan checkbox jika ada -->
                        @isset($table_checkbox)
                            <th width="30">{{$table_checkbox}}</th>
                        @endisset
                        
                        <!-- tempat menampilkan judul kolom tabel -->
                        <th width="50">No</th>
                        {{ $table_column }}                           
                        <th width="100"> Aksi </th>
                    </tr>
                </thead>
                <tbody>
                    {{ $slot }} <!-- tempat menampilkan body tabel -->
                </tbody>
            </table>

                </div>
            </div>
        </div>

        <!-- pagination link -->
        <div class="row">
            <div class="col">
                {{ $table_page }}
            </div>
        </div>

    </div>
</div><!-- end card -->

<!-- panggil komponen modal -->
<div x-show.transition="showModal" x-cloak>
    {{ $page_form }}
</div>

<!-- tampat menampilkan dialog -->
{{ $dialog }}

<!-- panggil komponen toast -->
<x-toast></x-toast>

</div><!-- end container -->