<div class="flex py-2" wire:poll.2000ms>
    <a href="{{ route('account.profile', $status->user->UsernameOrHash) }}" class="flex">
        <div class="flex-shrink-0 mr-3">
            <img src="{{ $status->user->gravatar() }}" alt="" class="object-cover object-center w-12 h-12 rounded-full">
        </div>
    </a>
    <div class="w-full">
        <div class="flex items-center ml-2 font-semibold">
            <a href="{{ route('account.profile', $status->user->UsernameOrHash) }}" class="flex">
                <div class="hover:underline">
                    {{ $status->user->name }} 
                </div>
            </a>
                <div class="ml-2 text-sm text-gray-400 hover:text-gray-500">
                    {{ '@'.$status->user->UsernameOrHash }}
                </div>
            </div>
        <div class="w-full ml-2">
            <a href="{{ route('status', $status->hash) }}">
                <div class="mb-1 leading-loose">
                    {{ $status->body }}
                </div>
                <div class="text-sm text-gray-400">
                    {{ $status->published }}
                </div>
            </a>
        </div>

        <div class="flex items-center mt-2 -mx-4 text-sm text-gray-300">
            <div class="flex items-center mx-4">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
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
        </div>
    </div>
</div>
