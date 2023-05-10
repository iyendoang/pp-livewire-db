<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Pendaftar;

class PendaftarDetail extends Component
{
    //deklarasi properti
    public $pendaftar;

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['showData'];
    
    //render file blade
    public function render()
    {
        return view('livewire.admin.pendaftar-detail');
    }

    //menyiapkan data pendaftar untuk ditampilkan pada modal detail ketika tombol tampil detail diklik
    public function showData($id){
        $this->pendaftar = Pendaftar::find($id);

        $this->dispatchBrowserEvent('detail-ready');
    }

}
