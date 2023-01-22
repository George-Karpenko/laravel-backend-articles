<?php

namespace App\Http\Livewire;

use App\Models\Author;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AuthorComponent extends Component
{
    public Author $author;

    protected $rules = [
        'author.first_name' => 'required|min:6',
        'author.last_name' => 'required|min:6',
    ];

    public function mount()
    {
        $this->author = new Author();
        if (Auth::user()->author) {
            $this->author = Auth::user()->author;
        }
    }

    public function render()
    {
        return view('livewire.author-component');
    }

    public function storeOrEdit()
    {
        $this->validate();
        Auth::user()->author()->save($this->author);
        $this->emit('saved');
    }
}
