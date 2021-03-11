<div class="bg-gray-100">
    <div class="flex justify-center">
        <div class="flex w-full md:w-5/12">
            <div class="flex-1 py-2 text-center border-r border-gray-300">
                <div class="text-gray-500">
                    Status
                </div>
                <div class="text-xl font-semibold text-gray-800">
                    250
                </div>
            </div>
            <div class="flex-1 py-2 text-center border-r border-gray-300">
                <div class="text-gray-500">
                    Following
                </div>
                <div class="text-xl font-semibold text-gray-800">
                    {{ $user->follows()->count() }}
                </div>
            </div>
            <div class="flex-1 py-2 text-center">
                <div class="text-gray-500">
                    Followers
                </div>
                <div class="text-xl font-semibold text-gray-800">
                    {{ $user->followers()->count() }}
                </div>
            </div>
        </div>
    </div>
</div>
