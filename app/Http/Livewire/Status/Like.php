<?php

namespace App\Http\Livewire\Status;

use Livewire\Component;
use App\Models\Timeline\Status;

class Like extends Component
{
    public $status;

    public function mount(Status $status)
    {
        $this->status = $status;
    }

    public function likes()
    {

        if ($this->status->isLiked()) {
            auth()->user()->likes()->delete($this->status->likes);
        } else {
            auth()->user()->likes()->save($this->status->likes()->make());
        }
    }

    public function render()
    {
        return view('livewire.status.like');
    }
}
