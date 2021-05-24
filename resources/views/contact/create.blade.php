@extends('layouts.back')

@section('content')
<div class="container">
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
