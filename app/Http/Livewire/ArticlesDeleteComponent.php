<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Article;

class ArticlesDeleteComponent extends Component
{
    public Article $article;
    public $title;
    public $text;
    public bool $isModalDeleteVisible = false;

    protected $listeners = [
        'delete_show_modal' => 'delete_show_modal',
    ];

    public function delete_show_modal(Article $article)
    {
        $this->article = $article;
        $this->isModalDeleteVisible = true;
        $this->title = 'Article deleted :,(';
        $this->text = 'The article "' . $this->article->title . '" has been deleted!';
    }

    public function render()
    {
        return view('livewire.articles-delete-component');
    }

    public function delete()
    {
        $this->article->delete();

        $this->isModalDeleteVisible = false;

        $this->emit('deleted', ["event-notification" => [
            "title" => $this->title,
            "text" => $this->text
        ]]);
    }
}
