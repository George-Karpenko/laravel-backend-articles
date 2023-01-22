<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Validation\Rule;

class CategoriesFormComponent extends Component
{
    public Category $category;
    public $title;
    public $text;
    public $modalFormVisible = false;

    protected $listeners = [
        'create_show_modal' => 'create_show_modal',
        'update_show_modal' => 'update_show_modal'
    ];

    public function create_show_modal()
    {
        $this->category = new Category();
        $this->modalFormVisible = true;
        $this->title = "New category :D";
        $this->text = "A new category has been created!";
    }

    public function update_show_modal(Category $category)
    {
        $this->category = $category;
        $this->modalFormVisible = true;
        $this->title = "Updated category :D";
        $this->text = 'The category "' . $this->category->title . '"has been updated!';
    }

    public function render()
    {
        return view('livewire.categories-form-component');
    }

    public function rules()
    {
        return [
            'category.title' => [
                'required', 'min:6', 'max:255',
                Rule::unique('categories', 'title')->ignore($this->category->id),
            ]
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function storeOrEdit()
    {
        $this->validate();
        $this->category->save();

        $this->modalFormVisible = false;

        $this->emit('saved');
        $this->dispatchBrowserEvent('event-notification', [
            "title" => $this->title,
            "text" => $this->text
        ]);
    }
}
