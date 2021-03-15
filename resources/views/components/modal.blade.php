@props(['trigger'])

<div {{ $attributes->merge([ 'class' => 'p-8 m-auto shadow-2xl rounded-2xl']) }}>
    {{ $slot }}
</div>