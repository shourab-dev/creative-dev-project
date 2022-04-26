<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StatusButton extends Component
{
    public $status;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($status = 0)
    {
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.status-button');
    }
}
