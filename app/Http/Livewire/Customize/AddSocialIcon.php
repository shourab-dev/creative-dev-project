<?php

namespace App\Http\Livewire\Customize;

use App\Models\SocialIcons;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class AddSocialIcon extends ModalComponent
{
    public $icon;
    public $link;

    public function addSocial()
    {
        $newSocial = new SocialIcons();
        $newSocial->icon = 'bi bi-' . $this->icon;
        $newSocial->link = $this->link;
        $newSocial->save();
        $this->emit('success');
        $this->closeModal();
    }
    public function render()
    {
        return view('livewire.customize.add-social-icon');
    }
}
