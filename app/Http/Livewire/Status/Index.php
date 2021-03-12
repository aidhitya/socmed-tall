<?php

namespace App\Http\Livewire\Status;

use App\Models\Timeline\Statuses;
use Livewire\Component;

class Index extends Component
{
    public $page = 10, $status;

    protected $listeners = [
        'statusAdded'
    ];

    public function statusAdded($status) {}

    public function loadMore()
    {
        $this->page += 15;
    }

    public function render()
    {
        $ids = auth()->user()->follows()->pluck('id')->push(auth()->id());
        $statuses = Statuses::whereIn('user_id', $ids)->with('user')->latest()->paginate($this->page);

        return view('livewire.status.index',[
            'statuses' => $statuses
        ]);
    }
}
