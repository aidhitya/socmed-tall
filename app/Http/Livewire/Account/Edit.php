<?php

namespace App\Http\Livewire\Account;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $name, $username, $picture;
    
    /**
     * mount
     *
     * @return void
     */
    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->username = auth()->user()->username;
    }
    
    /**
     * rules validation
     *
     * @return void
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|string',
            'username' => 'required|min:3|max:25|string|unique:users,username,' . auth()->id(),
            'picture' => $this->picture ? 'image|mimes:jpg,jpeg,png|max:1024' : '',
        ];
    }

    public function updated($fieldName)
    {
        $this->validateOnly($fieldName,[
            'name' => 'min:3|string',
            'username' => 'required|min:3|max:25|string|unique:users,username,' . auth()->id(),
            'picture' => 'image|mimes:jpg,jpeg,png|max:1024'
        ]);
    }
    
    /**
     * edit profile
     *
     * @return void
     */
    public function edit()
    {
        $this->validate();

        if ($this->picture) {

            Storage::delete(auth()->user()->picture);
            $picture = $this->picture->store('images/profile');

        } else {
            $picture = auth()->user()->picture ?? null;
        }

        auth()->user()->update([
            'name' => $this->name,
            'username' => $this->username,
            'picture' => $picture
        ]);

         return redirect(route('setting.edit'));
    }
    
    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.account.edit');
    }
}
