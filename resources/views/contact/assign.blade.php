@extends('layouts.back')

@section('content')
    <div class="container">
        <div class="col-md-5">
        <div class="card mb-2">
            <div class="card-header">Assign contact to Agen</div>
            <div class="card-body">
                <form action="{{ route('contact.assign.store') }}" method="post">                   
                    @include('contact.partials.form-assign')
                </form>
            </div>
        </div>
        </div>
    </div>
    
@endsection
