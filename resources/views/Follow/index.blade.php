@extends('layouts.app', ['title' => 'Followers / Following'])

@section('content')
    <div class="container mt-5 md:m-10">
        <div class="p-4 text-lg font-semibold border-b border-gray-300">
            {{ ucfirst($follow) }}
        </div>
        <div class="p-6">
            <div class="flex flex-wrap">
                @foreach ($follows as $follow)
                    <div class="w-full mb-2 lg:w-1/2">
                        <div class="flex items-center">
                            <img src="{{ $follow->gravatar() }}" alt="{{ $follow->usernameOrHash }}" class="object-cover object-center w-20 h-20 rounded-full">
                        </div>
                        <div class="">
                            {{ $follow->name }}
                        </div>
                        <div class="text-sm text-gray-600">
                            {{ $follow->created_at->format('d F, Y') }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection