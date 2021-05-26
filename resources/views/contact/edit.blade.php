@extends('layouts.back')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-auto">
                <a href="{{ route('contact.table') }}" role="button" class="btn btn-primary"> < Back Contact</a>
            </div>
        </div>
        <div class="col-md-5">
        <div class="card mb-2">
            <div class="card-header">Update Navigation</div>
            <div class="card-body">
                <form action="{{ route('contact.update', $contact) }}" method="post">
                    @method("PUT")
                    @include('contact.partials.form-edit')
                </form>
            </div>
        </div>
        </div>
    </div>    
@endsection
