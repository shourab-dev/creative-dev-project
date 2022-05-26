<?php

namespace App\Http\Livewire\Blog;

use App\Http\Controllers\BlogController;
use App\Models\BlogCategory;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class AddCategory extends ModalComponent
{
    public $dp_name;
    public $dp_id;

    public function mount()
    {
        if ($this->dp_id) {

            $department = BlogCategory::find($this->dp_id, ['id', 'name']);
            $this->dp_name = $department->name;
        }
    }


    public function departmentUpdate()
    {
        if ($this->dp_id) {
            $department = BlogCategory::find($this->dp_id);
        } else {
            $department = new BlogCategory();
        }
        $department->name = $this->dp_name;
        $department->save();
        $this->emit('success');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.blog.add-category');
    }
}
