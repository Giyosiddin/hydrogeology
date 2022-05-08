<?php

namespace App\View\Components\admin\components;

use Illuminate\View\Component;

class galllert-table extends Component
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
        return view('components.admin.components.galllert-table');
    }
}
