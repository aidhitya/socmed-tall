<?php

namespace App\Http\Livewire\Status;

use App\Models\Timeline\Status;
use Livewire\Component;

class Card extends Component
{
    public $status, $deleteModal = false;

    protected $listeners = ['deleteSuccess'];
    
    public function mount($status)
    {
        $this->status = $status;
    }

    public function deleteSuccess()
    {
        $this->status->fresh();
        $this->deleteModal = false;
        $this->emit('deleted');
    }

    public function render()
    {
        return view('livewire.status.card');
    }
}
