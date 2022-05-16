<?php

namespace App\Http\Livewire\Customize;

use App\Models\Footer as FooterModel;
use Livewire\Component;

class Footer extends Component
{
    protected  $listeners = ['course-img' => 'setFooterImage'];

    public $footerLogo;
    public $footerMoto;
    public $footerAddress;
    public $copyright;
    public function mount()
    {
        $footer = FooterModel::first();
        $this->footerLogo = $footer->logo;
        $this->footerMoto = $footer->moto;
        $this->footerAddress = $footer->address;
        $this->copyright = $footer->copyright;
    }
    public function updateFooter()
    {
        $updateFooter = FooterModel::first();
        $updateFooter->logo = $this->footerLogo;
        $updateFooter->moto = $this->footerMoto;
        $updateFooter->address = $this->footerAddress;
        $updateFooter->copyright = $this->copyright;
        $updateFooter->save();
        session()->flash('message', 'Your Changes has been Saved!');
    }
    public function render()
    {
        return view('livewire.customize.footer');
    }

    public function setFooterImage($link)
    {
        $this->footerLogo = $link['link'];
    }
}
