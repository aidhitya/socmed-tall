<?php

namespace App\Http\Livewire\Status;

use App\Models\Timeline\Status;
use Livewire\Component;

class Delete extends Component
{
    public $status;
    protected $listeners = [];

    public function mount($status)
    {
        $this->status = $status;
    }

        
    /**
     * delete on index comp
     *
     * @return void
     */
    public function delete()
    {
        $this->emit('deleteStatus', $this->status->id);
    }

    public function render()
    {
        return view('livewire.status.delete');
    }
}
