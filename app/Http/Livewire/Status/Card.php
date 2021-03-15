<?php

namespace App\Http\Livewire\Status;

use App\Models\Timeline\Status;
use Livewire\Component;

class Card extends Component
{
    public $status, $showSuccess = false;

    protected $listeners = ['showModalSuccess'];
    
    public function mount($status)
    {
        $this->status = $status;
    }

    public function showModalSuccess($status)
    {
        // $st = Status::where('hash', $status)->first()->delete();
        $this->showSuccess = true;
    }

    public function render()
    {
        return view('livewire.status.card');
    }
}
