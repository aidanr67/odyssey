@extends('layouts.app')

@section('content')
    <style>
        @media(prefers-color-scheme: dark){}
    </style>

    <div class="relative min-h-screen bg-gray-100 bg-center sm:flex sm:justify-center sm:items-center dark:bg-gray-900 selection:bg-indigo-500 selection:text-white">
        <h1 class="mb-4 text-5xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Odyssey Home</h1>
        <p>{{ $pageText }}</p>
    </div>
@endsection
