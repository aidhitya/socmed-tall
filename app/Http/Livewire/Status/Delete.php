<?php

namespace App\Http\Livewire\Status;

use App\Models\Timeline\Status;
use Livewire\Component;

class Delete extends Component
{
    public $status;

    public function mount(Status $status)
    {
        $this->status = $status;
    }

    /**
     * subscribe model
     *
     * @return void
     */
    public function delete()
    {
        $this->status->delete();
        // $this->showSuccess = true;

        return redirect(route('timeline'));
    }

    public function render()
    {
        return view('livewire.status.delete');
    }
}
