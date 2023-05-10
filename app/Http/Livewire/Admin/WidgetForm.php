<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Widget;

class WidgetForm extends Component
{
    //deklarasi properti
    public $id_widget;
    public $judul;
    public $konten;
    public $posisi = "Bawah";

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['editData'];
    
    //render file blade
    public function render()
    {
        return view('livewire.admin.widget-form');
    }

    public function save()
    {
        //validasi data sebelum disimpan
        $validated = $this->validate([
            'judul' => 'required',
            'konten' => 'required',
            'posisi' => 'required',
        ]);

        if($this->id_widget){      
            //update jika id tidak null       
            $widget = Widget::find($this->id_widget);
            $widget->judul = $this->judul;
            $widget->konten = $this->konten;
            $widget->posisi = $this->posisi;
            $widget->update();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message',['msg'=>'Data berhasil diperbarui']);
        }else{
            //create jika id null
            $max = Widget::max('urut');
            $widget = new Widget;
            $widget->judul = $this->judul;
            $widget->konten = $this->konten;
            $widget->posisi = $this->posisi;
            $widget->urut = $max + 1;
            $widget->save();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message',['msg'=>'Data berhasil ditambahkan']);
        }

        $this->resetForm(); //kosongkan form (cek method resetForm())//kosongkan form (cek method resetForm())
        $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }

    public function editData($id){
        //ambil data dari database untuk diedit
        $widget = Widget::find($id);
        $this->id_widget = $id;
        $this->judul = $widget->judul;
        $this->konten = $widget->konten;
        $this->posisi = $widget->posisi;

        //kirim pesan melalui event browser bahwa data siap diedit untuk kemudian ditampilkan modal form
        $this->dispatchBrowserEvent('edit-ready');
    }

    public function resetForm()
    {
        //reset data untuk kosongkan form
        $this->id_widget = null;
        $this->judul = null;
        $this->konten = null;
        $this->posisi = null;
    }
}
