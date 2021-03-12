@extends('layouts.app', ['title' => 'Timeline'])

@section('content')
    <div class="container mt-5 md:m-10">
        <div class="flex">
            <div class="w-full md:w-1/2">
                @livewire('status.create')
                @livewire('status.index')
            </div>
        </div>
    </div>
@endsection