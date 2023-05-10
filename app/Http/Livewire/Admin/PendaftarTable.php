<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Pendaftar;
use App\Models\Periode;

use App\Exports\ExportPendaftar;//download excel
use Excel;

class PendaftarTable extends Component
{
    use WithPagination;

    //deklarasi properti
    public $search = '';
    public $perPage = 10;
    public $sortField = 'id'; 
    public $sortAsc = false; 

    public $id_delete = null;

    public $id_edit = null;
    public $data_edit = null;
    public $field_edit = null;

    public $selectedData = [];
    public $selectAll = false;

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = [ 'refreshTable' => '$refresh'];
  
    //render file blade
    public function render()
    {
        $search = $this->search;
        $periode = Periode::where('aktif','=','Y')->first();
        
        //query dengan pengaturan sorting dan search data
        $pendaftar = Pendaftar::where('id_periode','=',$periode->id)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        if(!empty($search)) $pendaftar = $pendaftar->where(function($q) use ($search) {
            $q->where('nama', 'LIKE', '%'. $search . '%')
              ->where('nama_sekolah', 'LIKE', '%' . $search . '%')
              ->where('nisn', 'LIKE', '%' . $search . '%')
              ->where('alamat', 'LIKE', '%' . $search . '%')
              ->where('desa', 'LIKE', '%' . $search . '%')
              ->where('kecamatan', 'LIKE', '%' . $search . '%')
              ->where('kota', 'LIKE', '%' . $search . '%');
        });

        return view('livewire.admin.pendaftar-table', [
            'pendaftar' => $pendaftar->paginate($this->perPage),
        ]);
    }

    public function delete()
    {
        //hapus data dan kirim pesan keberhasilan melalui event browser
        Pendaftar::find($this->id_delete)->delete();
        $this->id_delete = null;
        $this->dispatchBrowserEvent('show-message',['msg'=>'Data berhasil dihapus']);
    }

    public function sortBy($field)
    {
        //mengatur kolom data yang diurutkan beserta metode pengurutanya sesuai judul kolom tabel diklik
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    //buka dialog konfirmasi sebelum hapus data
    public function openConfirm($id){
        $this->id_delete = $id;
    }

    //tutup dialog konfirmasi ketika klik batal
    public function closeConfirm(){
        $this->id_delete = null;
    }

    //menentukan field yang akan diedit ketika data diklik
    public function setEdit($id, $field){
        $pendaftar = Pendaftar::find($id);
        $this->id_edit = $id;
        $this->data_edit = $pendaftar->$field;
        $this->field_edit = $field;

        //akses listener untuk menampilkan input edit pada data sesuai id dan field data yang diklik
        $this->dispatchBrowserEvent('show-edit', ['id'=>$id, 'field'=>$field]);
    }

    //simpan data yang diedit ketika selectbox dipilih
    public function updatedDataEdit(){
        $field = $this->field_edit;
        $pendaftar = Pendaftar::find($this->id_edit);
        $pendaftar->$field = $this->data_edit;
        $pendaftar->update();
    }

    //update property select-all ketika checkbox select all diklik
    public function updatedSelectAll($value){
        if($value){
            $this->selectedData = Pendaftar::pluck('id');
        }else{
            $this->selectedData = [];
        }
    }

    //download excel
    public function downloadExcel(){
        $pendaftar = new ExportPendaftar();
        return Excel::download($pendaftar, 'Data Pendaftar.xlsx');
    }
}
