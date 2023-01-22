<?php

namespace App\Http\Livewire;

use App\Models\Category;

abstract class BaseArticlesComponent extends BaseComponent
{

    public $categories;
    public $filterByCategory;
    public $columnsByWhichYouCanSort;


    protected $listeners = [
        'deleted' => 'deleted'
    ];

    abstract protected function articles();

    public function deleted($params)
    {
        if ($this->articles->currentPage() > $this->articles->lastPage()) {
            $this->gotoPage($this->articles->lastPage());
        }
        $this->dispatchBrowserEvent('event-notification', $params['event-notification']);
    }

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

    public function updatingFilterByCategory()
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
            [
                "name" => __("Date of publication"),
                "value" => "posted_at"
            ],
        ];

        $this->filterByCategory = null;
        $this->categories = Category::select('title as name', 'id as value')->get()->toArray();
        array_unshift($this->categories, [
            'name' => __('All'),
            'value' => $this->filterByCategory
        ]);
    }
}
