<div class="mb-5 overflow-hidden border border-gray-300 rounded">
    <div class="p-4 font-semibold text-black bg-gray-100">
        Create New Status
    </div>
    <div class="">
        <form wire:submit.prevent="store">
            <div x-data="{disableSubmit: true, body: null}">
                <div class="p-3">
                    <textarea class="w-full p-0 border-0 border-none rounded focus:ring-0 focus:outline-none focus:shadow-none" placeholder="What's In Your Mind. . ." wire:model="body" x-model="body" x-on:input="[(body.length == 0) ? disableSubmit = true : ((body.length > 255) ? disableSubmit = true : disableSubmit = false)]"></textarea>
                    @error('body')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end px-4 py-2 mt-2 bg-gray-50">
                    <x-button.primary x-on:click="body = null" x-bind:disabled="disableSubmit" x-bind:class="{'disabled:opacity-50 pointer-events-none' : disableSubmit}">
                        create
                    </x-button.primary>
                </div>
            </div>
        </form>
    </div>
</div>
