<div class="w-full p-5 mt-5 border border-gray-100 rounded shadow bg-gray-50 md:w-7/12">
    <h1 class="font-sans text-lg text-center text-gray-500 capitalize">Edit Profile</h1>
    
    <div class="mt-1">
        <form wire:submit.prevent="edit">
            <div class="mb-2">
                <label for="name" class="block mb-1 font-medium">Name</label>
                <input id="name" type="text" class="w-full border-gray-300 rounded @error('name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" wire:model="name">
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="picture" class="block mb-1 font-medium capitalize">profile picture</label>
                <input id="picture" type="file" class="w-full border-gray-300 rounded @error('picture') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" wire:model="picture">
                @error('picture')
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
            <div class="mt-5">
                <button type="submit" class="flex justify-center px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring-indigo active:bg-indigo-700">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>