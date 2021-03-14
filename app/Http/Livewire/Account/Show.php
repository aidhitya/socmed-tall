<?php

namespace App\Http\Livewire\Account;

use App\Models\Timeline\Status;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;

class Show extends Component
{
    public $user,
        $page = 10,
        $readmore = true,
        $bio;

    public function mount($identifier)
    {
        $this->user = User::where('username', $identifier)->orWhere('hash', $identifier)->firstOrFail();
        $this->bio = Str::limit($this->user->description, 120);
    }

    public function loadMore()
    {
        $this->page += 15;
    }

    public function readMore()
    {
        $this->bio = $this->user->description;
        $this->readmore = false;
    }
    
    public function readLess()
    {
        $this->bio = Str::limit($this->user->description, 120);
        $this->readmore = true;
    }
    

    public function render()
    {
        $statuses = Status::where('user_id', $this->user->id)->with('user')->latest()->paginate($this->page);
        return view('livewire.account.show',[
            'statuses' => $statuses
        ]);
    }
}
