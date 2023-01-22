<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ModalStatusComponent extends Component
{
    public $status;
    public $modalStatusVisible;

    public function mount()
    {
        $this->modalStatusVisible = !!$this->status;
    }

    public function render()
    {
        return view('livewire.modal-status-component');
    }
}
