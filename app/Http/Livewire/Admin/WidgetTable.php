<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Widget;

class WidgetTable extends Component
{
    use WithPagination;

    //deklarasi properti
    public $search = '';
    public $perPage = 10;
    public $sortField = 'urut'; 
    public $sortAsc = true; 

    public $id_delete = null;

    public $id_edit = null;
    public $data_edit = null;
    public $field_edit = null;

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = [ 'refreshTable' => '$refresh'];
  
    //render file blade
    public function render()
    {
        $search = $this->search;

        //query dengan pengaturan sorting dan search data
        $widget = Widget::orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        if(!empty($search)) $widget = $widget->where('judul', 'LIKE', '%'. $search . '%');

        return view('livewire.admin.widget-table', [
            'widget' => $widget->paginate($this->perPage),
            'max' => Widget::max('urut'),
            'min' => Widget::min('urut')
        ]);
    }

    public function delete()
    {
        //hapus data dan kirim pesan keberhasilan melalui event browser
        Widget::find($this->id_delete)->delete();
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
        $widget = Widget::find($id);
        $this->id_edit = $id;
        $this->data_edit = $widget->$field;
        $this->field_edit = $field;

        //akses listener untuk menampilkan input edit pada data sesuai id dan field data yang diklik
        $this->dispatchBrowserEvent('show-edit', ['id'=>$id, 'field'=>$field]);
    }

    //simpan data yang diedit
    public function saveEdit(){
        $field = $this->field_edit;
        $widget = Widget::find($this->id_edit);
        $widget->$field = $this->data_edit;
        $widget->update();
    }

    //simpan data yang diedit ketika select box diklik
    public function updatedDataEdit(){
        $field = $this->field_edit;
        $pendaftar = Widget::find($this->id_edit);
        $pendaftar->$field = $this->data_edit;
        $pendaftar->update();
    }

    //turunkan urutan widget
    public function sortDown($id){
        $widget = Widget::find($id);
        $max = Widget::where('urut', '<', $widget->urut)->orderBy('urut','desc')->first();
        if($max){
            $max->urut = $widget->urut;
            $max->update();
        } 
        $widget->urut -= 1;
        $widget->update();
    }

    //naikkan urutan widget
    public function sortUp($id){
        $widget = Widget::find($id);
        $min = Widget::where('urut', '>', $widget->urut)->orderBy('urut','asc')->first();
        if($min){
            $min->urut = $widget->urut;
            $min->update();
        } 
        $widget->urut += 1;
        $widget->update();
    }
}
