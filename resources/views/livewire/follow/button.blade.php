<div>
    @if (auth()->check() && auth()->user()->is($user))

        <a href="{{ route('setting.edit') }}" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring-indigo active:bg-indigo-700">
            Edit Your Profile
        </a>
        
    @else

        @if (!auth()->check() || auth()->user()->isNot($user))

            @if (auth()->check() && auth()->user()->following($user))

                <x-button.danger wire:click="unfollow">
                    Unfollow
                </x-button.danger>

            @else
            
                <x-button.primary wire:click="follow">
                    Follow
                </x-button.primary>
                
            @endif
        
        @endif

    @endif
</div>
