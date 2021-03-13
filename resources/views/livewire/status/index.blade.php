<div>
    @foreach ($statuses as $status)
        <div class="flex py-2 mb-5 border-b border-gray-300" wire:poll.2000ms>
            <a href="{{ route('account.profile', $status->user->UsernameOrHash) }}" class="flex">
                <div class="flex-shrink-0 mr-3">
                    <img src="{{ $status->user->gravatar() }}" alt="" class="object-cover object-center w-12 h-12 rounded-full">
                </div>
            </a>
            <div class="">
                <a href="{{ route('account.profile', $status->user->UsernameOrHash) }}" class="flex">
                    <div class="font-semibold">
                        {{ $status->user->name }} <span class="text-sm text-gray-400">{{ '@'.$status->user->UsernameOrHash }}</span>
                    </div>
                </a>
                <div class="">
                    {{ $status->body }}
                </div>
                <div class="text-sm text-gray-400">
                    {{ $status->published }}
                </div>
            </div>
        </div>
    @endforeach

    @if ($statuses->hasMorePages())
        <div class="flex justify-center mb-5">
            <x-button.primary wire:click.prevent='loadMore'>
                <span wire:loading>
                    Please Wait ....
                </span>
                <span wire:loading.class='hidden'>
                    Load More
                </span>
            </x-button.primary>
        </div>
    @endif
</div>
