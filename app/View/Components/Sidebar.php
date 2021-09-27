<?php

namespace App\View\Components;

use App\Models\SuratSkd;
use App\Models\SuratSkp;
use App\Models\SuratSktm;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $sktm = SuratSktm::where('status','Ajukan')->get()->count();
        $skd = SuratSkd::where('status','Ajukan')->get()->count();
        $skp = SuratSkp::where('status','Ajukan')->get()->count();
        $total = $sktm + $skd + $skp;
        return view('components.sidebar', compact('total'));
    }
}
