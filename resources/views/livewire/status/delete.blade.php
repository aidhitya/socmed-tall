<div class="fixed top-0 left-0 flex items-center w-full h-full bg-fixed bg-gray-500 bg-opacity-50" x-on:click.slef="deleteButton = false">
    <x-modal class="left-0 px-10 py-6 bg-white border border-red-500 md:p-8 md:px-20">
        <svg class="w-16 h-16 mx-auto text-red-500 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <p class="text-2xl font-semibold text-center text-black md:text-4xl">Are You Sure ?</p>
        <div class="flex justify-between w-full mt-2">
            <button @click="deleteButton = !deleteButton" class="px-4 py-2 text-gray-500 bg-gray-200 rounded hover:bg-gray-100">
                Cancel
            </button>
            <button wire:click="delete" class="px-4 py-2 text-white bg-red-400 rounded hover:bg-red-300">
                Delete
            </button>
        </div>
    </x-modal>
</div>