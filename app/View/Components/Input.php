<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $placeholder;
    public $type;
    public $error;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($placeholder = null, $type = 'text', $error = null)
    {
        $this->placeholder = $placeholder;
        $this->type = $type;
        $this->error = $error;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input');
    }
}
