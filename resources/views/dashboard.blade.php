@extends('layouts.back')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Your Dashboard</div>
            <div class="card-body">
                Hi {{ auth()->user()->name }}
            </div>
        </div>
    </div>
@endsection