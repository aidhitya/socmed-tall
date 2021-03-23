<div class="bg-gray-300 border-t border-gray-300">
    <div class="flex items-center justify-center md:justify-between md:mx-4">
        <div class="hidden text-3xl font-bold md:ml-10 md:block">
            Your Tweets
        </div>
        <div class="flex w-full md:w-5/12">
            <div class="flex-1 py-2 text-center border-r border-gray-400">
                <div class="text-gray-500">
                    Status
                </div>
                <div class="text-xl font-semibold text-gray-800">
                    {{ $user->statuses()->count() }}
                </div>
            </div>
            <a href="{{ route('statistic', [auth()->user()->usernameOrHash, 'following']) }}" class="flex-1 py-2 text-center border-r border-gray-400">
                <div class="text-gray-500">
                    Following
                </div>
                <div class="text-xl font-semibold text-gray-800">
                    {{ $user->follows()->count() }}
                </div>
            </a>
            <a href="{{ route('statistic', [auth()->user()->usernameOrHash, 'followers']) }}" class="flex-1 py-2 text-center">
                <div class="text-gray-500">
                    Followers
                </div>
                <div class="text-xl font-semibold text-gray-800">
                    {{ $user->followers()->count() }}
                </div>
            </a>
        </div>
    </div>
</div>
