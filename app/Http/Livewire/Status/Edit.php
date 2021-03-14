<?php

namespace App\Http\Livewire\Status;

use App\Models\Timeline\Status;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Edit extends Component
{
    use AuthorizesRequests;

    public $status, $body;

    protected $rules = [
        'body' => 'required'
    ];

    public function mount(Status $status)
    {
        $this->body = $status->body;
        $this->status = $status;
    }

    public function update()
    {
        $this->authorize('update', $this->status);
        $this->status->update([
            'body' => $this->body
        ]);

        return redirect(route('status', $this->status->hash));
    }

    public function render()
    {
        $this->authorize('update', $this->status);
        return view('livewire.status.edit');
    }
}
