<div class="bg-gray-200">
    <div class="container md:mx-20">
        <div class="flex py-10">
            <div class="mr-4">
                <img src="{{ $user->gravatar() }}" alt="" class="w-20 h-20 rounded-full">
            </div>
            <div class="">
                <h1 class="text-xl font-semibold text-black">{{ $user->name }}</h1>
                <div class="mt-1 mb-5 text-gray-500">
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
