<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Slide;
use Storage;
class SlideTable extends Component
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

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = [ 'refreshTable' => '$refresh'];
  
    //render file blade
    public function render()
    {
        $search = $this->search;

        //query dengan pengaturan sorting dan search data
        $slide = Slide::orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        if(!empty($search)) $informasi = $informasi->where(function($q) use ($search) {
            $q->where('judul', 'LIKE', '%'. $search . '%')
              ->orWhere('deskripsi', 'LIKE', '%' . $search . '%');
        });
        
        return view('livewire.admin.slide-table', [
            'slide' => $slide->paginate($this->perPage),
        ]);
    }

    public function delete()
    {
        //hapus data dan kirim pesan keberhasilan melalui event browser
        $slide = Slide::find($this->id_delete);
        Storage::delete('slide/'.$slide->gambar);
        $slide->delete();
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
        $slide = Slide::find($id);
        $this->id_edit = $id;
        $this->data_edit = $slide->$field;
        $this->field_edit = $field;

        //akses listener untuk menampilkan input edit pada data sesuai id dan field data yang diklik
        $this->dispatchBrowserEvent('show-edit', ['id'=>$id, 'field'=>$field]);
    }

    //simpan data yang diedit
    public function saveEdit(){
        $field = $this->field_edit;
        $slide = Slide::find($this->id_edit);
        $slide->$field = $this->data_edit;
        $slide->update();
    }

}
