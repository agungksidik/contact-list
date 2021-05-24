@extends('layouts.base')

@section('body')
    <x-navigation></x-navigation>
    <div class="mt-4">
        @yield('content')
    </div>
@endsection