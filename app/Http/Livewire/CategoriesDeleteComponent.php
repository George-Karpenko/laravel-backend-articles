<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoriesDeleteComponent extends Component
{
    public Category $category;
    public $title;
    public $text;
    public bool $isModalDeleteVisible = false;

    protected $listeners = [
        'delete_show_modal' => 'delete_show_modal',
    ];

    public function delete_show_modal(Category $category)
    {
        $this->category = $category;
        $this->isModalDeleteVisible = true;
        $this->title = 'Category deleted :,(';
        $this->text = 'The category "' . $this->category->title . '" has been deleted!';
    }

    public function render()
    {
        return view('livewire.categories-delete-component');
    }

    public function delete()
    {
        $this->category->delete();

        $this->isModalDeleteVisible = false;

        $this->emit('deleted');
        $this->dispatchBrowserEvent('event-notification', [
            "title" => $this->title,
            "text" => $this->text
        ]);
    }
}
