<?php

namespace App\Http\Livewire\Status;

use App\Models\Timeline\Status;
use Livewire\Component;

class Delete extends Component
{
    public $status;
    protected $listeners = [];

    public function mount(Status $status)
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
        $this->status->delete();
        return redirect(route('timeline'));
    }

    public function render()
    {
        return view('livewire.status.delete');
    }
}
