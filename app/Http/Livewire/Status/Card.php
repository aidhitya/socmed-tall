<?php

namespace App\Http\Livewire\Status;

use Livewire\Component;

class Card extends Component
{
    public $status;
    
    public function mount($status)
    {
        $this->status = $status;
    }

    public function render()
    {
        return view('livewire.status.card');
    }
}
