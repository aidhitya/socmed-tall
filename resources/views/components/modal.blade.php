@props(['trigger'])

<div {{ $attributes->merge([ 'class' => 'm-auto shadow-2xl rounded-2xl']) }}>
    {{ $slot }}
</div>