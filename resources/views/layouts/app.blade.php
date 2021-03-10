@extends('layouts.base')

@section('body')

    @include('layouts.partials.nav')

    @yield('content')
    
    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
