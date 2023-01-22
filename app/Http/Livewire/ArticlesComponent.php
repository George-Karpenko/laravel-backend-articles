<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Author;
use Livewire\WithPagination;

class ArticlesComponent extends BaseArticlesComponent
{
    use WithPagination;

    public $authors;
    public $filterByAuthor;


    public function updatingFilterByAuthor()
    {
        $this->resetPage();
    }

    public function mount()
    {
        parent::mount();

        $this->filterByAuthor = null;
        $this->authors = Author::select('id as value', 'first_name', 'last_name')->get()
            ->map(function ($author) {
                $author->name = $author->fullName();
                return $author;
            })->toArray();
        array_unshift($this->authors, [
            'name' => __('All'),
            'value' => $this->filterByAuthor
        ]);
    }

    public function render()
    {
        return view('livewire.articles-component', [
            'articles' => $this->articles()
        ]);
    }

    protected function articles()
    {
        $filterByCategory = $this->filterByCategory;
        $filterByAuthor = $this->filterByAuthor;

        return Article::search($this->search)
            ->when($filterByCategory, function ($q) use ($filterByCategory) {
                return $q->where('category_id', $filterByCategory);
            })
            ->when($filterByAuthor, function ($q) use ($filterByAuthor) {
                return $q->where('author_id', $filterByAuthor);
            })
            ->orderBy($this->orderBy, $this->isOrderAsc ? 'asc' : 'desc')
            ->paginate($this->prePage);
    }
}
