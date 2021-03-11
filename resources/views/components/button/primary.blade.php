<div class="">
    <button {{ $attributes->merge([
        'class' => 'flex justify-center px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring-indigo active:bg-indigo-700',
        'type' => 'submit'
    ]) }}>
        {{ $slot }}
    </button>
</div>