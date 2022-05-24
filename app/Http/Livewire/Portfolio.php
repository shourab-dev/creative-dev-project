<?php

namespace App\Http\Livewire;

use App\Models\Portfolio as ModelsPortfolio;
use Livewire\Component;

class Portfolio extends Component
{
    public $text;
    public $link;
    public function mount()
    {
        $portfolio = ModelsPortfolio::first();
        $this->text = $portfolio->text;
        $this->link = $portfolio->link;
    }
    public function updatePortfolio()
    {
        $portfolio = ModelsPortfolio::first();
        $portfolio->text = $this->text;
        $portfolio->link = $this->link;
        $portfolio->save();
        session()->flash('message', 'Portfolio Updated!');
    }
    public function render()
    {
        return view('livewire.portfolio');
    }
}
