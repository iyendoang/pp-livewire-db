<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Periode;
use App\Models\Setting;

class FrontLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        //kirimkan periode aktif untuk mengecek status pendaftaran dibuka atau belum
        $periode = Periode::where('aktif','=','Y')->first();
        return view('layouts.front',[
            'periode'=>$periode,
            'setting'=>Setting::first(),
        ]); 
    }
}
