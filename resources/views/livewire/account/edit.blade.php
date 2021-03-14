<div class="container">
    <div class="flex">
        <div class="w-full mt-5 bg-gray-100 border border-gray-100 rounded shadow md:w-7/12">
            <h1 class="p-3 font-sans text-lg font-semibold text-center text-gray-700 capitalize">
                Edit Your Profile
            </h1>
            
            <div class="mt-1 bg-white">
                <form wire:submit.prevent="edit" class="p-5">
                    <div class="mb-5">
                        <div class="flex items-center">
                            @if ($picture)
                                <img src="{{ $picture->temporaryUrl() }}" alt="" class="object-cover object-center w-20 h-20 rounded-full">
                                @else
                                <img src="{{ auth()->user()->gravatar() }}" alt="" class="object-cover object-center w-20 h-20 rounded-full">
                            @endif
                            
                            <label for="picture" class="block px-3 py-2 mb-1 ml-3 font-medium capitalize border border-gray-300 rounded-lg bg-gray-50">upload picture</label>
                            <input id="picture" type="file" class="sr-only border-gray-300 rounded @error('picture') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" wire:model="picture">
                            @error('picture')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="name" class="block mb-1 font-medium">Name</label>
                        <input id="name" type="text" class="w-full border-gray-300 rounded @error('name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" wire:model="name">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="username" class="block mb-1 font-medium">Username</label>
                        <input id="username" type="text" class="w-full border-gray-300 rounded @error('username') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" wire:model="username">
                        @error('username')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="description" class="block mb-1 font-medium">Bio</label>
                        <textarea wire:model="description" id="description" rows="5" class="w-full border-gray-300 rounded @error('description') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror"></textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-5">
                        <x-button.primary>
                            Update
                        </x-button.primary>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>