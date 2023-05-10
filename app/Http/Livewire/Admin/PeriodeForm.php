<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Periode;

class PeriodeForm extends Component
{
    //deklarasi properti
    public $id_periode;
    public $tahun;
    public $tanggal_buka;
    public $tanggal_tutup;
    public $aktif = 'Y';

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['editData'];

    //render file blade
    public function render()
    {
        return view('livewire.admin.periode-form');
    }

    public function save()
    {
        //validasi data sebelum disimpan
        $validated = $this->validate([
            'tahun' => 'required',
            'tanggal_buka' => 'required',
            'tanggal_tutup' => 'required',
        ]);

        //update aktif menjadi N pada semua data 
        if($this->aktif=='Y') Periode::query()->update(['aktif'=>'N']);
        
        if($this->id_periode){    
            //update jika id tidak null         
            $periode = Periode::find($this->id_periode);
            $periode->tahun = $this->tahun;
            $periode->tanggal_buka = $this->tanggal_buka;
            $periode->tanggal_tutup = $this->tanggal_tutup;
            $periode->aktif = $this->aktif;
            $periode->update();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message',['msg'=>'Data berhasil diperbarui']);
        }else{
            //create jika id null
            $periode = new Periode;
            $periode->tahun = $this->tahun;
            $periode->tanggal_buka = $this->tanggal_buka;
            $periode->tanggal_tutup = $this->tanggal_tutup;
            $periode->aktif = $this->aktif;
            $periode->save();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message',['msg'=>'Data berhasil ditambahkan']);
        }

        $this->resetForm(); //kosongkan form (cek method resetForm())
        $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }

    public function editData($id){
        //ambil data dari database untuk diedit
        $periode = Periode::find($id);
        $this->id_periode = $id;
        $this->tahun = $periode->tahun;
        $this->tanggal_buka = $periode->tanggal_buka;
        $this->tanggal_tutup = $periode->tanggal_tutup;
        $this->aktif = $periode->aktif;

        //kirim pesan melalui event browser bahwa data siap diedit untuk kemudian ditampilkan modal form
        $this->dispatchBrowserEvent('edit-ready');
    }

    public function resetForm()
    {
        //reset data untuk kosongkan form
        $this->id_periode = null;
        $this->tahun = null;
        $this->tanggal_buka = null;
        $this->tanggal_tutup = null;
        $this->aktif = null;
    }
}
