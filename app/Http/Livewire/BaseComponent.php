<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BaseComponent extends Component
{
    public $prePage = 5;
    public $search = '';
    public $orderBy = 'id';
    public $isOrderAsc = true;

    protected $listeners = [
        'saved' => '$refresh',
        'deleted' => '$refresh'
    ];


    public function createShowModal()
    {
        $this->emit('create_show_modal');
    }

    public function updateShowModal($id)
    {
        $this->emit('update_show_modal', ['id' => $id]);
    }

    public function deleteShowModal($id)
    {
        $this->emit('delete_show_modal', ['id' => $id]);
    }
}
