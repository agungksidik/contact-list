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
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Remark</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>                    
                    @foreach($tasks as $index => $task)
                    <tr>
                        <td>{{ $index + $tasks->firstItem() }}</td>
                        <td>{{ $task->contact->name }}</td>
                        <td>{{ $task->contact->phone }}</td>
                        <td>{{ $task->remark }}</td>
                        <td>
                            @if ($task->status == 'uncontacted')
                                <span class="badge rounded-pill bg-danger">{{ $task->status }}</span>
                            @elseif ($task->status == 'pending')
                                <span class="badge rounded-pill bg-warning">{{ $task->status }}</span>
                            @elseif ($task->status == 'qualified')
                                <span class="badge rounded-pill bg-primary">{{ $task->status }}</span>
                            @elseif ($task->status == 'lost')
                                <span class="badge rounded-pill bg-success">{{ $task->status }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a href="#" class="btn btn-primary">Follow up & View history</a> 
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
