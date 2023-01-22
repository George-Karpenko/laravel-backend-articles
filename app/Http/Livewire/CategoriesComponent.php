<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\WithPagination;

class CategoriesComponent extends BaseComponent
{

    use WithPagination;

    public $columnsByWhichYouCanSort;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPrePage()
    {
        $this->resetPage();
    }

    public function updatingIsOrderAsc()
    {
        $this->resetPage();
    }

    public function updatingOrderBy()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->columnsByWhichYouCanSort = [
            [
                "name" => __("Id"),
                "value" => "id"
            ],
            [
                "name" => __("Title"),
                "value" => "title"
            ],
        ];
    }

    public function render()
    {
        return view('livewire.categories-component', [
            'categories' => Category::search($this->search)
                ->orderBy($this->orderBy, $this->isOrderAsc ? 'asc' : 'desc')
                ->paginate($this->prePage)
        ]);
    }
}
