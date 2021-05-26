@extends('layouts.back')

@section('content')    
    <div class="container mt-3">
        <div class="row mb-4">
            <div class="col-auto">
                <a href="{{ route('contact.create') }}" role="button" class="btn btn-primary">Create new Contact</a>
            </div>
        </div>
        @if (\Session::has('success'))
            <div class="alert alert-success">
                {!! \Session::get('success') !!}
            </div>
        @endif
        <div class="card mb-5">
            <div class="card-header text-center"><h5 class="fw-bold">Contact list with Livewire</h5></div>
            <div class="card-body">
                @livewire('contact.card')
            </div>
        </div>        
    </div>    
@endsection
