<div class="container my-5 md:ml-20">
    <div class="flex">
        <div class="w-full md:w-1/2">
            <div class="mb-5 overflow-hidden border border-gray-300 rounded">
                <div class="p-4 font-semibold text-black bg-gray-100">
                    Edit Your Status
                </div>
                <div class="">
                    <form wire:submit.prevent="update">
                        <div x-data="{disableSubmit: true, body: @entangle('body').defer}">
                            <div class="p-3">
                                <textarea class="w-full p-0 border-0 border-none rounded focus:ring-0 focus:outline-none focus:shadow-none" placeholder="What's In Your Mind. . ." wire:model.lazy="body" x-model="body" x-on:input="[(body.length == 0) ? disableSubmit = true : ((body.length > 255) ? disableSubmit = true : disableSubmit = false)]"></textarea>
                                @error('body')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex justify-end px-4 py-2 mt-2 bg-gray-50">
                                <x-button.primary x-bind:disabled="disableSubmit" x-bind:class="{'disabled:opacity-50 pointer-events-none' : disableSubmit}">
                                    update
                                </x-button.primary>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>