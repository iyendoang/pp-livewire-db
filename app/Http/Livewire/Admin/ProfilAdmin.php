<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Auth;

class ProfilAdmin extends Component
{
    //deklarasi properti
    public $name;
    public $email;
    public $password;
    public $confirm_password;

    //menentukan nilai awal properti
    public function __construct()
    {
        $this->name = Auth::guard('admin')->user()->name;
        $this->email = Auth::guard('admin')->user()->email;
    }

    //render file blade
    public function render()
    {
        return view('livewire.admin.profil-admin');
    }

    public function save(){
        //validasi data sebelum disimpan
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'confirm_password' => 'same:password',
        ]);

        //update data
        $user = Auth::guard('admin')->user();
        $user->name = $this->name;
        $user->email = $this->email;
        if($this->password) $user->password = Hash::make($this->password);
        $user->update();

        //kirim pesan keberhasilan melalui event browser
        $this->dispatchBrowserEvent('show-message',['msg'=>'Data telah disimpan']);
        
        //reset data
        $this->password = null;
        $this->confirm_password = null;
    }
}
