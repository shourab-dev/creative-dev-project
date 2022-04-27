<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FileInput extends Component
{
    public  $multiple;
    public $iteration;
    public $label;
    public $error;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($multiple = false, $iteration = 1, $label = null, $error = null)
    {
        $this->multiple = $multiple;
        $this->iteration = $iteration;
        $this->label = $label;
        $this->error = $error;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.file-input');
    }
}
