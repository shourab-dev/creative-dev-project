<?php

namespace App\Http\Livewire\Customize;

use App\Models\Customize;
use Livewire\Component;

class PromoModal extends Component
{
    protected  $listeners = ['course-img' => 'setModalImg'];

    public $modalStatus;
    public $modalImg;
    public $preloader;
    public function mount()
    {
        $customize = Customize::first();

        $this->modalStatus = $customize->promo_modal;

        if ($customize->modal_img != null) {
            $this->modalImg = $customize->modal_img;
        }
        $this->preloader = $customize->preloader;
    }
    public function render()
    {
        return view('livewire.customize.promo-modal');
    }



    public function updatedModalStatus()
    {
        $customize = Customize::first();
        if ($customize->promo_modal == true) {
            $customize->promo_modal = false;
            $this->modalStatus = 0;
        } else {
            $customize->promo_modal = true;
            $this->modalStatus = 1;
        }
        $customize->save();
    }
    public function updatedPreloader()
    {
        $customize = Customize::first();
        if ($customize->preloader == true) {
            $customize->preloader = false;
            $this->preloader = 0;
        } else {
            $customize->preloader = true;
            $this->preloader = 1;
        }
        $customize->save();
    }

    public function setModalImg($link)
    {
        $this->modalImg = $link['link'];
        $customize = Customize::first();
        $customize->modal_img = $this->modalImg;
        $customize->save();
    }
}
