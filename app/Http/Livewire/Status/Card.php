<?php

namespace App\Http\Livewire\Status;

use App\Models\Timeline\Status;
use Livewire\Component;

class Card extends Component
{
    public $status, $deleteModal = false, $comment;
    
    public function mount(Status $status)
    {
        $this->status = $status->load(['comments' => function($q){
            $q->latest();
        }]);
    }

    public function render()
    {
        return view('livewire.status.card');
    }
}
