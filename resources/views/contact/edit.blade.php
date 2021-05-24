@extends('layouts.back')

@section('content')
    <div class="card mb-2">
        <div class="card-header">Create new Navigation</div>
        <div class="card-body">
            <form action="{{ route('navigation.edit', $navigation) }}" method="post">
                @method("PUT")
                @include('navigation.partials.form-control')
            </form>
        </div>
    </div>
    @include('navigation.delete', ['navigation' => $navigation])
@endsection
