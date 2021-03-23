<?php

namespace App\Http\Livewire\Status;

use App\Models\Timeline\Status;
use Livewire\Component;

class Show extends Component
{
    public $status;
    protected $listeners = [
        'commentAdded'
    ];

    public function commentAdded($comment)
    {
    }

    
    public function mount(Status $status){
        $this->status = $status->load(['comments.user' => function($q){
            $q->latest();
        }])->loadCount('comments');
        // dd($this->status);
    }

    public function render()
    {
        return view('livewire.status.show');
    }
}
