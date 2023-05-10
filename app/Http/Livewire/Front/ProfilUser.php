<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Auth;

class ProfilUser extends Component
{
    //deklarasi properti
    public $name;
    public $email;
    public $password;
    public $confirm_password;

    //menentukan nilai awal properti
    public function __construct()
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    //render view blade
    public function render()
    {
        return view('livewire.front.profil-user');
    }

    public function save(){
        //validasi sebelum update data
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'confirm_password' => 'same:password',
        ]);

        //update data
        $user = Auth::user();
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
