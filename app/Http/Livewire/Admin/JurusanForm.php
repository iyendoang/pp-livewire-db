<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Jurusan;

class JurusanForm extends Component
{
    //deklarasi properti
    public $id_jurusan;
    public $nama_jurusan;
    public $singkatan;
    public $deskripsi;

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['editData'];

    //render file blade
    public function render()
    {
        return view('livewire.admin.jurusan-form');
    }

    public function save()
    {
        //validasi data sebelum disimpan
        $validated = $this->validate([
            'nama_jurusan' => 'required',
            'singkatan' => 'required',
        ]);

        if($this->id_jurusan){
            //update jika id tidak null 
            $jurusan = jurusan::find($this->id_jurusan);
            $jurusan->nama_jurusan = $this->nama_jurusan;
            $jurusan->singkatan = $this->singkatan;
            $jurusan->deskripsi = $this->deskripsi;
            $jurusan->update();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message',['msg'=>'Data berhasil diperbarui']);
        }else{
            //create jika id null
            $jurusan = new Jurusan;
            $jurusan->nama_jurusan = $this->nama_jurusan;
            $jurusan->singkatan = $this->singkatan;
            $jurusan->deskripsi = $this->deskripsi;
            $jurusan->save();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message',['msg'=>'Data berhasil ditambahkan']);
        }

        $this->resetForm(); //kosongkan form (cek method resetForm())
        $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }

    public function editData($id){
        //ambil data dari database untuk diedit
        $jurusan = Jurusan::find($id);
        $this->id_jurusan = $id;
        $this->nama_jurusan = $jurusan->nama_jurusan;
        $this->singkatan = $jurusan->singkatan;
        $this->deskripsi = $jurusan->deskripsi;

        //kirim pesan melalui event browser bahwa data siap diedit untuk kemudian ditampilkan modal form
        $this->dispatchBrowserEvent('edit-ready', ['data'=>$this->deskripsi]);
    }

    public function resetForm()
    {
        //reset data untuk kosongkan form
        $this->id_jurusan = null;
        $this->nama_jurusan = null;
        $this->singkatan = null;
        $this->deskripsi = null;
    }
}
