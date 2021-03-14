<div>
    @if (auth()->check() && auth()->user()->is($user))

        <a href="{{ route('setting.edit') }}" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-black transition duration-150 ease-in-out border border-gray-200 rounded-md shadow-md bg-gray-50 hover:bg-gray-100 focus:outline-none focus:border-gray-400 focus:ring-gray active:bg-gray-200">
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
