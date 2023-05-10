<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Pendaftar;

class PendaftarForm extends Component
{
    //deklarasi properti
    public $selected_data;
    public $status_seleksi = "Belum Dikonfirmasi";

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['editData'];
    
    //render file blade
    public function render()
    {
        return view('livewire.admin.pendaftar-form');
    }

    public function save()
    {
        //validasi data sebelum disimpan
        $validated = $this->validate([
            'status_seleksi' => 'required',
            'selected_data' => 'required',
        ],[
            'selected_data.required' => "Tidak ada data dipilih"
        ]);

        //update status seleksi 
        Pendaftar::whereIn('id', $this->selected_data)->update([
            'status_seleksi' => $this->status_seleksi
        ]);
        
        //kirim pesan keberhasilan melalui event browser
        $this->dispatchBrowserEvent('show-message',['msg'=>'Data berhasil diperbarui']);

        $this->resetForm(); //kosongkan form (cek method resetForm())
        $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }

    public function editData($selected_data){
        //ekstraksi data terseleksi dari format JSON
        $this->selected_data = json_decode($selected_data, true);

        //kirim pesan melalui event browser bahwa data siap diedit untuk kemudian ditampilkan modal form
        $this->dispatchBrowserEvent('edit-ready');
    }

    public function resetForm()
    {
        //reset data untuk kosongkan form
        $this->selected_data = null;
        $this->status_seleksi = "Belum Dikonfirmasi";
    }
}
