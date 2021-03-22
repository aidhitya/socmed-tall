<?php

namespace App\Http\Livewire\Status;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;

class Create extends Component
{
    public $body = '';

    protected $rules = [
        'body' => 'required|max:255'
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'body' => 'max:255'
        ]);
    }

    public function store()
    {
        $this->validate();

        $status = auth()->user()->statuses()->create([
            'hash' => Str::random(22) . strtotime(Carbon::now()),
            'body' => $this->body
        ]);

        $this->reset('body');
        $this->emit('statusAdded', $status);
        
    }

    public function render()
    {
        return view('livewire.status.create');
    }
}
