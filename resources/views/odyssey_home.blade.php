@extends('layouts.app')

@section('content')
    <style>
        @media(prefers-color-scheme: dark){}
    </style>

    <livewire:odyssey-form page="{!! $page !!}" pageNumber="{{ $pageNumber }}"/>

@endsection
