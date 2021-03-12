<div class="mb-5 overflow-hidden border border-gray-500 rounded">
    <div class="p-4 font-semibold text-black bg-gray-200">
        Create New Status ...
    </div>
    <div class="p-3">
        <form wire:submit.prevent="store">
            {{-- <div >
                <textarea class="w-full rounded-lg" wire:model="body" ></textarea>
                @error('body')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <div class="flex justify-end">
                    <x-button.primary>
                        submit
                    </x-button.primary>
                </div>
            </div> --}}
            <div x-data="{disableSubmit: true, body: null}">
                <textarea class="w-full rounded-lg" wire:model="body" x-model="body" x-on:input="[(body.length == 0) ? disableSubmit = true : ((body.length > 255) ? disableSubmit = true : disableSubmit = false)]"></textarea>
                @error('body')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <div class="flex justify-end">
                    <x-button.primary x-on:click="body: null" x-bind:disabled="disableSubmit" x-bind:class="{'disabled:opacity-50 pointer-events-none' : disableSubmit}">
                        submit
                    </x-button.primary>
                </div>
            </div>
        </form>
    </div>
</div>
