@extends('layouts.back')

@section('content')    
    <div class="container mt-3">
        <div class="row mb-4">
            <div class="col-auto">
                <a href="{{ route('task.table') }}" role="button" class="btn btn-primary"> < Back to My Task</a>
            </div>
        </div>
        @if (\Session::has('success'))
            <div class="alert alert-success">
                {!! \Session::get('success') !!}
            </div>
        @endif
        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-header  fw-bold">Hi, {{ Auth::user()->name }}</div>
                    <div class="card-body">
                        <h5 class="card-title mb-4">Contact Detail</h5>
                        <p class="card-text">Name : {{ $task->contact->name }}</p>
                        <p class="card-text">Phone : {{ $task->contact->phone }}</p>
                        <p class="card-text mb-4">Email : {{ $task->contact->email }}</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header fw-bold">Follow Up</div>
                    <div class="card-body">
                        <form action="{{ route('followup.store') }}" method="post">
                            @include('followup.partials.add-form')
                        </form>
                    </div>                    
                </div>
            </div>
        </div>        
        <div class="card">
            <div class="card-header fw-bold">History Follow Up</div>
            <div class="card-body">
                <table class="table table-hover">
                    <tr>
                        <th>No</th>
                        <th>Date</th>
                        <th>Remark</th>
                        <th>Agen</th>
                        <th>Status</th>
                    </tr>
                    @if (count($followups) < 1)
                        <tr class="text-center">
                            <td colspan="5">                                
                                <h4>Data not found</h4>                           
                            </td>                         
                        </tr>              
                    @else
                        @foreach($followups as $index => $followup)
                            <tr>
                                <td>{{ $index + $followups->firstItem() }}</td>
                                <td>{{ $followup->follow_up_date }}</td>
                                <td>{{ $followup->remark }}</td>
                                <td>{{ $followup->task->user->name }}</td> 
                                <td>
                                    @if ($followup->status == 'uncontacted')
                                        <span class="badge rounded-pill bg-danger">{{ $followup->status }}</span>
                                    @elseif ($followup->status == 'pending')
                                        <span class="badge rounded-pill bg-warning">{{ $followup->status }}</span>
                                    @elseif ($followup->status == 'qualified')
                                        <span class="badge rounded-pill bg-primary">{{ $followup->status }}</span>
                                    @elseif ($followup->status == 'lost')
                                        <span class="badge rounded-pill bg-success">{{ $followup->status }}</span>
                                    @endif
                                </td>                                               
                            </tr>
                        @endforeach  
                    @endif                   
                </table>
                <div class="d-flex justify-content-between">
                    <div>
                        {{ $followups->links() }}
                    </div>                    
                </div>
            </div>
        </div>
    </div>    
@endsection
