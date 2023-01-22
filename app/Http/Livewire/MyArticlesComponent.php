<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class MyArticlesComponent extends BaseArticlesComponent
{
    use WithPagination;

    public function render()
    {
        $filterByCategory = $this->filterByCategory;
        return view('livewire.my-articles-component', [
            'articles' => $this->articles()
        ]);
    }

    protected function articles()
    {
        $filterByCategory = $this->filterByCategory;

        return Article::search($this->search)
            ->where('author_id', Auth::user()->author->id)
            ->when($filterByCategory, function ($q) use ($filterByCategory) {
                return $q->where('category_id', $filterByCategory);
            })
            ->orderBy($this->orderBy, $this->isOrderAsc ? 'asc' : 'desc')
            ->paginate($this->prePage);
    }
}
