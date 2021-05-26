@extends('layouts.back')

@section('content')
    
    <div class="container mt-3">
        
        @if (\Session::has('success'))
            <div class="alert alert-success">
                {!! \Session::get('success') !!}
            </div>
        @endif
        <div class="card">
            <div class="card-header">Data Table Task Agen</div>
            <div class="card-body">
                <table class="table table-hover">
                    <tr>
                        <th>No</th>
                        <th>Name Contact</th>
                        <th>Phone Contact</th>                        
                        <th>Agen</th>
                        <th>Action</th>
                    </tr>                    
                    @foreach($tasks as $index => $task)
                    <tr>
                        <td>{{ $index + $tasks->firstItem() }}</td>
                        <td>{{ $task->contact->name }}</td>
                        <td>{{ $task->contact->phone }}</td>                        
                        <td>{{ $task->user->name }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a href="{{ route('followup.table', $task->id) }}" class="btn btn-primary">Follow up & View history</a> 
                            </div>
                        </td>
                    </tr>
                @endforeach
                   
                </table>

                <div class="d-flex justify-content-between">
                    <div>
                        {{ $tasks->links() }}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
@endsection
