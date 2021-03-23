<div>
    @if ($status->comments_count)
        <div class="bg-white border border-gray-300 rounded md:ml-10 md:-mt-3 md:-mr-4" x-data="{
            showReplies: 'show',
            replyCardTab: 'show'
        }">
            @foreach ($comments as $comment)
                <div>
                    <div wire:key="{{ time() . $comment->id }}" class="w-full p-3 border-b border-gray-300">
                        <div class="flex items-center">
                            <a href="{{ route('account.profile', $comment->user->UsernameOrHash) }}" class="flex">
                                <div class="flex-shrink-0">
                                    <img src="{{ $comment->user->gravatar() }}" alt="" class="object-cover object-center w-8 h-8 rounded-full">
                                </div>
                            </a>
                            <div class="justify-between fleex">
                                <div class="flex items-center">
                                    <div class="flex ml-2 font-medium">
                                        <a href="{{ route('account.profile', $comment->user->UsernameOrHash) }}" class="flex items-center">
                                            <div class="hover:underline">
                                                {{ Str::limit($comment->user->name, 10, '...') }} 
                                            </div>
                                            <div class="ml-1 text-sm text-gray-400 hover:text-gray-500">
                                                {{ '@'.Str::limit($comment->user->UsernameOrHash, 10, '...') }}
                                            </div>
                                        </a>
                                    </div>
                                    <div class="hidden mx-2 text-sm text-gray-300 md:block">
                                        {{ $comment->published }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ml-10">
                            <div class="mb-1 leading-loose">
                                {!! nl2br($comment->body) !!}
                                <span class="mr-1 text-sm text-gray-200 md:hidden">{{ $comment->published }}</span>
                            </div>
                            <div class="flex items-center">
                                <div class="">
                                    <button  @click.prevent="showReplies = {{ $comment->id }}" class="mt-2 text-sm text-gray-400 hover:underline focus:ring-0 focus:outline-none">
                                        {{ $comment->children_count }} {{ Str::plural('Reply', $comment->children_count) }}
                                    </button>
                                </div>
                                <div class="flex items-center">
                                    @auth
                                        <button wire:click.prevent="showReplyForm({{ $comment->id }})" @click.prevent="replyCardTab = {{ $comment->id }}" x-bind:class="{'text-blue-400' : replyCardTab === {{ $comment->id }}}" class="mt-2 ml-2 text-sm text-gray-400 hover:underline focus:ring-0 focus:outline-none">
                                            <div class="flex items-center">
                                                Add Reply
                                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                                                </svg>
                                            </div>
                                        </button>
                                    @else
                                    <a href="{{ route('login') }}" class="mt-2 ml-2 text-sm text-gray-400 hover:underline focus:ring-0 focus:outline-none">
                                        <div class="flex items-center">
                                            Add Reply
                                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                                            </svg>
                                        </div>
                                    </a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                    @auth
                        <div x-show="replyCardTab === {{ $comment->id }}" wire:key="{{ time() + time() . $comment->id }}">
                            <div class="flex justify-end mx-2 border-b border-gray-300">
                                <div class="w-3/4 my-2">
                                    <form wire:submit.prevent="store">
                                        <div x-data="{disableSubmit: true, body: null}">
                                            <div class="">
                                                <textarea class="w-full p-1 border border-gray-300 rounded-lg focus:ring-0 focus:outline-none focus:shadow-none" placeholder="What's Your Idea. . ." wire:model.lazy="body" x-model="body" x-on:input="[(body.length == 0) ? disableSubmit = true : ((body.length > 255) ? disableSubmit = true : disableSubmit = false)]"></textarea>
                                                @error('body')
                                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="flex justify-end">
                                                <x-button.secondary x-on:click="body = null" x-bind:disabled="disableSubmit" x-bind:class="{'disabled:opacity-50 pointer-events-none' : disableSubmit}">
                                                    reply
                                                </x-button.secondary>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endauth
                </div>

                @if ($comment->children_count)
                    @foreach ($comment->children as $child)
                        <div wire:key="{{ time() . $child->id }}" x-show="showReplies === {{ $comment->id }}" class="w-full p-3 border-b border-gray-300">
                            <div class="ml-16">
                                <div class="flex items-center text-base">
                                    <a href="{{ route('account.profile', $child->user->UsernameOrHash) }}" class="flex">
                                        <div class="flex-shrink-0">
                                            <img src="{{ $child->user->gravatar() }}" alt="" class="object-cover object-center rounded-full w-7 h-7">
                                        </div>
                                    </a>
                                    <div class="justify-between fleex">
                                        <div class="flex items-center">
                                            <div class="flex ml-2 font-medium">
                                                <a href="{{ route('account.profile', $child->user->UsernameOrHash) }}" class="flex items-center">
                                                    <div class="text-base hover:underline">
                                                        {{ Str::limit($child->user->name, 10, '...') }} 
                                                    </div>
                                                    <div class="ml-1 text-sm text-gray-400 hover:text-gray-500">
                                                        {{ '@'.Str::limit($child->user->UsernameOrHash, 6, '...') }}
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="hidden mx-2 text-sm text-gray-300 md:block">
                                                {{ $child->published }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-10">
                                    <a href="#">
                                        <div class="mb-1 leading-loose">
                                            {!! nl2br($child->body) !!}
                                            <span class="mr-1 text-sm text-gray-200 md:hidden">{{ $child->published }}</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endforeach
        </div>
    @endif
</div>