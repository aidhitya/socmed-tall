<div>
    @foreach ($statuses as $status)
        <div class="mb-5">
            @livewire('status.card', ['status' => $status], key(time() . $status->id))
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
