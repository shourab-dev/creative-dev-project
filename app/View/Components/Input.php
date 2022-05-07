<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $placeholder;
    public $type;
    public $error;
    public $name;
    public $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($placeholder = null, $type = 'text', $error = null, $name = null, $value = null)
    {
        $this->placeholder = $placeholder;
        $this->type = $type;
        $this->error = $error;
        $this->name = $name;
        $this->value = $value;
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
