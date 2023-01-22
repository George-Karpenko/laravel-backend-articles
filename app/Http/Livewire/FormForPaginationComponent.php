<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FormForPaginationComponent extends Component
{
    public $search;

    public function mount($search)
    {
        $this->search = $search;
    }

    public function render()
    {
        return view('livewire.form-for-pagination-component');
    }
}
