<?php

namespace App\Http\Livewire\Status;

use App\Models\Timeline\Status;
use Livewire\Component;

class Show extends Component
{
    public $status;
    
    public function mount(Status $status){
        $this->status = $status->load('user');
    }

    public function render()
    {
        return view('livewire.status.show');
    }
}
