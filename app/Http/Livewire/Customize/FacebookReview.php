<?php

namespace App\Http\Livewire\Customize;

use App\Models\FbReview;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class FacebookReview extends ModalComponent
{
    public $iframe;
    public function render()
    {
        return view('livewire.customize.facebook-review');
    }
    public function saveReview()
    {
        $this->validate([
            'iframe' => 'required'
        ]);
        FbReview::create([
            'iframe' => $this->iframe,
        ]);
        $this->emit('success');
        $this->closeModal();
    }
}
