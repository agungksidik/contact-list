@extends('layouts.back')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-auto">
                <a href="{{ route('contact.table') }}" role="button" class="btn btn-primary"> < Back Contact</a>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Create new Contact</div>
                <div class="card-body">
                    <form action="{{ route('contact.store') }}" method="post">
                        @include('contact.partials.form-control')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
