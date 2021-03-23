<?php

namespace App\Http\Livewire\Comment;

use App\Models\Timeline\Status;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class Create extends Component
{
    public $body = '', $status;

    protected $rules = [
        'body' => 'required|max:255'
    ];

    public function mount(Status $status)
    {
        $this->status = $status;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'body' => 'max:255'
        ]);
    }

    public function store()
    {
        $this->validate();

        $comment = auth()->user()->comments()->create([
            'status_id' => $this->status->id,
            'hash' => Str::random(22) . strtotime(Carbon::now()),
            'body' => $this->body
        ]);

        $this->reset('body');
        $this->emit('commentAdded', $comment->id);
    }

    public function render()
    {
        return view('livewire.comment.create');
    }
}
