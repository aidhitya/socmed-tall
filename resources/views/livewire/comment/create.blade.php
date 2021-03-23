<div>
    <div class="flex">
        <div class="w-full my-2">
            <form wire:submit.prevent="store">
                <div x-data="{disableSubmit: true, body: null}">
                    <div class="">
                        <textarea class="w-full p-1 border border-gray-300 rounded-lg focus:ring-0 focus:outline-none focus:shadow-none" placeholder="What's Your Idea. . ." wire:model="body" x-model="body" x-on:input="[(body.length == 0) ? disableSubmit = true : ((body.length > 255) ? disableSubmit = true : disableSubmit = false)]"></textarea>
                        @error('body')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-end">
                        <x-button.secondary x-on:click="body = null" x-bind:disabled="disableSubmit" x-bind:class="{'disabled:opacity-50 pointer-events-none' : disableSubmit}">
                            comment
                        </x-button.secondary>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
