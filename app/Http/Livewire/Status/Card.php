<?php

namespace App\Http\Livewire\Status;

use App\Models\Timeline\Status;
use Livewire\Component;

class Card extends Component
{
    public $status, $deleteModal = false;
    
    public function mount(Status $status)
    {
        $this->status = $status;
    }

    public function render()
    {
        return view('livewire.status.card');
    }
}
