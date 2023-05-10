<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Informasi;

class InformasiForm extends Component
{
    //deklarasi properti
    public $id_informasi;
    public $judul;
    public $konten;
    public $tampil_beranda = 'Y';

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['editData'];

    //render file blade
    public function render()
    {
        return view('livewire.admin.informasi-form');
    }

    public function save()
    {
        //validasi data sebelum disimpan
        $validated = $this->validate([
            'judul' => 'required',
            'konten' => 'required',
        ]);

        if($this->id_informasi){   
            //update jika id tidak null         
            $informasi = Informasi::find($this->id_informasi);
            $informasi->judul = $this->judul;
            $informasi->konten = $this->konten;
            $informasi->tampil_beranda = $this->tampil_beranda;
            $informasi->update();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message',['msg'=>'Data berhasil diperbarui']);
        }else{
            //create jika id null
            $informasi = new Informasi;
            $informasi->judul = $this->judul;
            $informasi->konten = $this->konten;
            $informasi->tampil_beranda = $this->tampil_beranda;
            $informasi->save();
            
            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message',['msg'=>'Data berhasil ditambahkan']);
        }

        $this->resetForm(); //kosongkan form (cek method resetForm())
        $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }

    public function editData($id){
        //ambil data dari database untuk diedit
        $informasi = Informasi::find($id);
        $this->id_informasi = $id;
        $this->judul = $informasi->judul;
        $this->konten = $informasi->konten;
        $this->tampil_beranda = $informasi->tampil_beranda;

        //kirim pesan melalui event browser bahwa data siap diedit untuk kemudian ditampilkan modal form
        $this->dispatchBrowserEvent('edit-ready', ['data'=>$this->konten]);
    }

    public function resetForm()
    {
        //reset data untuk kosongkan form
        $this->id_informasi = null;
        $this->judul = null;
        $this->konten = null;
        $this->tampil_beranda = null;
    }
}
