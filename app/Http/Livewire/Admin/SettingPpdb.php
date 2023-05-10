<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Setting;
use Storage;

class SettingPpdb extends Component
{
    use WithFileUploads;

   //deklarasi properti
   public $nama_sekolah;
   public $alamat_sekolah;
   public $email_sekolah;
   public $telp_sekolah;
   public $logo_sekolah;
   public $judul_header;

   public $logo;
   public $judul;

   //menentukan nilai awal properti
   public function __construct()
   {
       $setting = Setting::first();
       if($setting){
           $this->nama_sekolah      = $setting->nama_sekolah;
           $this->alamat_sekolah    = $setting->alamat_sekolah;
           $this->email_sekolah     = $setting->email_sekolah;
           $this->telp_sekolah      = $setting->telp_sekolah;
           $this->logo_sekolah      = $setting->logo_sekolah;
           $this->judul_header      = $setting->judul_header;
       }
   }

   //render file blade
   public function render()
   {
       return view('livewire.admin.setting-ppdb');
   }

   public function save(){
       //validasi data sebelum disimpan
       $this->validate([
           'nama_sekolah' => 'required',
           'alamat_sekolah' => 'required',
           'email_sekolah' => 'required',
           'telp_sekolah' => 'required',
           'logo' => 'nullable|image|mimes:png|max:2048',
           'judul' => 'nullable|image|mimes:png|max:2048',
       ]);

       if($this->logo) $this->logo->storeAs('img', 'logo.png');
       if($this->judul) $this->judul->storeAs('img', 'judul.png');

       //update data
       $setting = Setting::first();
       if($setting){
            $setting->nama_sekolah      = $this->nama_sekolah;   
            $setting->alamat_sekolah    = $this->alamat_sekolah;
            $setting->email_sekolah     = $this->email_sekolah; 
            $setting->telp_sekolah      = $this->telp_sekolah;  
            $setting->logo_sekolah      = "logo.png";  
            $setting->judul_header      = "judul.png";  
            $setting->update();
       }
                            
       //kirim pesan keberhasilan melalui event browser
       $this->dispatchBrowserEvent('show-message',['msg'=>'Data telah disimpan']);
    
   }
}
