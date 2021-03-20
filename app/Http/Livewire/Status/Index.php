<?php

namespace App\Http\Livewire\Status;

use App\Models\Timeline\Status;
use Livewire\Component;

class Index extends Component
{
    public $page = 10, $status;

    protected $listeners = [
        'statusAdded', 'deleteStatus'
    ];

    public function statusAdded($status) {}

    public function deleteStatus($statusid)
    {
        Status::destroy($statusid);
        $this->emit('deleteSuccess');
    }

    public function loadMore()
    {
        $this->page += 15;
    }

    public function render()
    {
        $ids = auth()->user()->follows()->pluck('id')->push(auth()->id());
        $statuses = Status::whereIn('user_id', $ids)->with('user')->latest()->paginate($this->page);

        return view('livewire.status.index',[
            'statuses' => $statuses
        ]);
    }
}
