<?php

namespace App\Http\Livewire\Customize;

use App\Models\Header as HeaderModel;
use Livewire\Component;

class Header extends Component
{
    protected  $listeners = ['course-img' => 'setHeaderImage'];
    public $header;
    public $headerLogo;
    public $headerPhone = [];
    public $headerEmail = [];
    public function setHeaderImage($link)
    {
        $this->headerLogo = $link['link'];
    }


    public function mount()
    {
        $this->header = HeaderModel::first();
        $this->headerLogo = $this->header->logo;
        $this->headerPhone = json_decode($this->header->phone)->phone;
        $this->headerEmail = json_decode($this->header->email)->email;
    }

    public function updateHeader()
    {
        $phoneNumber = json_encode($this->headerPhone);
        $phoneNumberArray = str($phoneNumber)->replace(']', '')->replace('"', '')->replace('[', '')->explode(',');
        $emailArray = str(json_encode($this->headerEmail))->replace(']', '')->replace('"', '')->replace('[', '')->explode(',');

        $headerUpdate = HeaderModel::first();
        $headerUpdate->logo = $this->headerLogo;
        $headerUpdate->phone = '{"phone":' . $phoneNumberArray . '}';
        $headerUpdate->email = '{"email":' . $emailArray . '}';
        $headerUpdate->save();
        session()->flash('message', 'Your Changes Has Been Saved!');
    }
    public function render()
    {
        return view('livewire.customize.header');
    }
}
