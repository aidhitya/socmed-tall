<div class="container">
    <div class="flex">
        <div class="mt-3 md:m-5 md:w-1/2 w-max">
            <div class="p-3 border border-gray-300 rounded-lg md:p-5">
                @livewire('status.card', ['status' => $status])
            </div>
                @livewire('comment.index', ['status' => $status], key(time() . $status->id))
        </div>
    </div>
</div>
