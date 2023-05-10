<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Widget;
use App\Models\Informasi;
use App\Models\Jurusan;
class FrontWidget extends Component
{
    public $posisi;
   
    //menentukan posisi widget sesuai props yang dikirim
    public function __construct($posisi)
    {
        $this->posisi = $posisi;
    }

    public function render()
    {
        //render widget sesuai posisinya
        $widget = Widget::where('posisi','=', $this->posisi)->orderBy('urut')->get();
        return view('layouts.front.widget', [
            'widget' => $widget,
            'informasi' => Informasi::all(),
            'jurusan' => Jurusan::all(),
        ]);
    }
}
