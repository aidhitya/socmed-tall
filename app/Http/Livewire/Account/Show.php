<?php

namespace App\Http\Livewire\Account;

use App\Models\Timeline\Status;
use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public $user, $page = 10;

    public function loadMore()
    {
        $this->page += 15;
    }

    public function mount($identifier)
    {
        $this->user = User::where('username', $identifier)->orWhere('hash', $identifier)->firstOrFail();
    }

    public function render()
    {
        $statuses = Status::where('user_id', $this->user->id)->with('user')->latest()->paginate($this->page);
        return view('livewire.account.show',[
            'statuses' => $statuses
        ]);
    }
}
