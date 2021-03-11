<?php

namespace App\Http\Livewire\Follow;

use App\Models\User;
use Livewire\Component;

class Button extends Component
{
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function follow()
    {
        if (!auth()->check()) {
           return redirect(route('login'));
        }

        auth()->user()->follow($this->user);
        $this->emit('statisticUpdated');
    }
    
    public function unfollow()
    {
        auth()->user()->unfollow($this->user);
        $this->emit('statisticUpdated');
    }

    public function render()
    {
        return view('livewire.follow.button');
    }
}
