<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'flex justify-center px-4 py-1 text-sm font-medium text-white transition duration-150 ease-in-out bg-gray-600 border border-transparent rounded-md hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:ring-gray active:bg-gray-700',
]) }}>
    {{ $slot }}
</button>