<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Slide;
use Storage;

class SlideForm extends Component
{
    use WithFileUploads;

    //deklarasi properti
    public $id_slide;
    public $judul;
    public $deskripsi;
    public $gambar;
    public $file;

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['editData'];
    
    //render file blade

    public function render()
    {
        return view('livewire.admin.slide-form');
    }

    public function save()
    {
        $validated = $this->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'file' => 'required|image|max:2048',
        ]);

        $namafile = time().'_'.$this->file->getClientOriginalName();
        $this->file->storeAs('slide', $namafile);

        if($this->id_slide){                  
            //update jika id tidak null     
            $slide = Slide::find($this->id_slide);
            
            Storage::delete('slide/'.$slide->gambar);//upload gambar
            
            $slide->judul = $this->judul;
            $slide->deskripsi = $this->deskripsi;
            $slide->gambar = $namafile;
            $slide->update();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message',['msg'=>'Data berhasil diperbarui']);
        }else{
            //create jika id null
            $slide = new Slide;
            $slide->judul = $this->judul;
            $slide->deskripsi = $this->deskripsi;
            $slide->gambar = $namafile;
            $slide->save();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message',['msg'=>'Data berhasil ditambahkan']);
        }

        $this->resetForm(); //kosongkan form (cek method resetForm())
        $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }

    public function editData($id){
        //ambil data dari database untuk diedit
        $slide = Slide::find($id);
        $this->id_slide = $id;
        $this->judul = $slide->judul;
        $this->deskripsi = $slide->deskripsi;
        $this->gambar = $slide->gambar;

        //kirim pesan melalui event browser bahwa data siap diedit untuk kemudian ditampilkan modal form
        $this->dispatchBrowserEvent('edit-ready');
    }

    public function resetForm()
    {
        //reset data untuk kosongkan form
        $this->id_slide = null;
        $this->judul = null;
        $this->deskripsi = null;
        $this->gambar = null;
        $this->file = null;
    }
}
