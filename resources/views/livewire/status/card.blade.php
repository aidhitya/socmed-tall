<div class="relative flex px-5 py-3 rounded hover:bg-gray-100" wire:poll.2000ms>
    <a href="{{ route('account.profile', $status->user->UsernameOrHash) }}" class="flex">
        <div class="flex-shrink-0 mr-3">
            <img src="{{ $status->user->gravatar() }}" alt="" class="object-cover object-center w-12 h-12 rounded-full">
        </div>
    </a>
    <div class="w-full"  x-data="{statusDropdown : false}">
        <div class="flex justify-between">
            <div class="flex items-center">
                <div class="flex ml-2 font-semibold">
                    <a href="{{ route('account.profile', $status->user->UsernameOrHash) }}" class="flex items-center">
                        <div class="hover:underline">
                            {{ $status->user->name }} 
                        </div>
                        <div class="ml-1 text-sm text-gray-400 hover:text-gray-500">
                            {{ '@'.$status->user->UsernameOrHash }}
                        </div>
                    </a>
                </div>
                <div class="mx-2 text-sm text-gray-300">
                    {{ $status->published }}
                </div>
            </div>
            <button @click="statusDropdown = !statusDropdown" class="top-0 right-0 text-sm text-gray-400 rounded-full focus:outline-none hover:text-gray-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">\
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div x-bind:class="{'hidden' : !statusDropdown}" class="absolute top-0 w-48 p-1 py-2 mt-8 bg-white rounded shadow right-5">
                <a href="#" class="block px-3 py-1 rounded hover:bg-gray-100">Edit Status</a>
                <a href="#" class="block px-3 py-1 rounded hover:bg-gray-100">Delete Status</a>
            </div>
        </div>
        <div class="w-full ml-2">
            <a href="{{ route('status', $status->hash) }}">
                <div class="mb-1 leading-loose">
                    {!! $status->body !!}
                </div>
            </a>
        </div>

        <div class="flex items-center mt-2 -mx-4 text-sm text-gray-300">
            <div class="flex items-center mx-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path>
                </svg>
                100 Likes
            </div>
            <div class="flex items-center mx-4 ml-2">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                </svg>
                23 Comments
            </div>
            <div class="flex items-center mx-4 ml-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                </svg>
            </div>
            <div class="flex items-center mx-4 ml-2">
                <div class="text-sm text-gray-400">
                   {{ $status->published }}
                </div>
            </div>
        </div>
    </div>
</div>
