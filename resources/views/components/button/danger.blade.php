<div class="">
    <button {{ $attributes->merge([
        'class' => 'flex justify-center px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring-red active:bg-red-700',
        'type' => 'submit'
    ]) }}>
        {{ $slot }}
    </button>
</div>