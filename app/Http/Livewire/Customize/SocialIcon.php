<?php

namespace App\Http\Livewire\Customize;

use App\Models\SocialIcons;
use Livewire\Component;

class SocialIcon extends Component
{
    protected $listeners = ['success', 'updateSocialMessage', 'updateStatusMessage'];

    public $socialIcons;
    public  function mount()
    {
        $this->socialIcons = SocialIcons::get()->toArray();
        // dd($this->socialIcons);
    }
    public function render()
    {
        return view('livewire.customize.social-icon', ['socialIcons' => $this->socialIcons]);
    }


    public function success()
    {
        session()->flash('message', 'New Social Link has been Added');
        $this->socialIcons = SocialIcons::get()->toArray();
    }
    public function updateSocialMessage()
    {
        session()->flash('message', 'Social Links has been updated');
    }
    public function updateStatusMessage($status)
    {
        session()->flash('message',   $status == 0 ? 'Status Updated to <b>Deactive</b> [Hit a Refresh to clear the cache]' : 'Status Updated to <b>Active</b> [Hit a Refresh to clear the cache]');
    }



    public function updateSocial($index)
    {

        $editedSocial = $this->socialIcons[$index];
        if ($editedSocial['icon'] == '') {
            return session()->flash('message', 'Social Icons can be empty (If you clear everything add [ bi bi- ])');
            exit();
        }
        $update = SocialIcons::find($editedSocial['id']);
        // dd($update);
        $update->icon = $editedSocial['icon'];
        $update->link = $editedSocial['link'];
        $update->save();
        $this->emit('updateSocialMessage');
    }



    public function updateStatus($id)
    {
        $socialIcon = SocialIcons::find($id);
        if ($socialIcon->status == 0) {
            $socialIcon->status = 1;
        } else {
            $socialIcon->status = 0;
        }
        $socialIcon->save();
        return $this->emit('updateStatusMessage', $socialIcon->status);
    }



    public function deleteIcon($id)
    {
        SocialIcons::find($id)->delete();

        return redirect()->route('customize.social');
    }
}
