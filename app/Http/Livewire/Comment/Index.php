<?php

namespace App\Http\Livewire\Comment;

use App\Models\Timeline\Comment;
use Livewire\Component;
use App\Models\Timeline\Status;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class Index extends Component
{
    public $status;
    public $body = '';
    public $comment;
    public $commentParrent;

    protected $listeners = [
        'commentAdded'
    ];

    protected $rules = [
        'body' => 'required'
    ];

    public function mount(Status $status)
    {
       $this->status = $status;
    }

    
    public function commentAdded($comment) {}
    
    public function showReplyForm($id)
    {
        $this->commentParrent = $id;
        $username = Comment::find($this->commentParrent)->user->username_or_hash;
        $this->body = "@{$username} ";
    }

    public function store()
    {
        $this->validate();

        auth()->user()->comments()->create([
            'status_id' => $this->status->id,
            'hash' => Str::random(22) . strtotime(Carbon::now()),
            'body' => $this->body,
            'parent_id' => $this->commentParrent
        ]);

        $this->reset('body');
    }

    public function render()
    {
        $comments = $this->status->comments()->where('parent_id', null)->with('children.user')->withCount('children')->get();
        return view('livewire.comment.index',[
            'comments' => $comments
        ]);
    }
}
