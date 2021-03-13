<div class="">
    <div class="bg-gray-300">
        <div class="container md:mx-20">
            <div class="flex py-10">
                <div class="mr-4">
                    <img src="{{ $user->gravatar() }}" alt="" class="w-20 h-20 rounded-full">
                </div>
                <div class="">
                    <h1 class="text-xl font-semibold text-black">{{ $user->name }}</h1>
                    <div class="mt-1 mb-5 text-gray-800">
                        {{ $user->description }}
                        <div class="text-md">
                            Joined: {{ $user->created_at->format('d F, Y') }}
                        </div>
                    </div>
                    @livewire('follow.button', ['user' => $user])
                </div>
            </div>
        </div>
    </div>

    @livewire('follow.statistic', ['user' => $user])
    <div class="container">
        <div class="flex w-full">
            <div class="p-3 px-3 mx-auto border-l border-r border-gray-200 shadow-sm md:p-5 md:px-40">
                @foreach ($statuses as $status)
                    @livewire('status.card', ['status' => $status], key($status->id))
                @endforeach

                @if ($statuses->hasMorePages())
                    <div class="flex justify-center mt-10 mb-10">
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
        </div>
    </div>
</div>
