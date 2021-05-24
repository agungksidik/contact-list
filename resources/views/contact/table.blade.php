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
        <div class="card">
            <div class="card-header">Data Table Contact</div>
            <div class="card-body">
                <table class="table table-hover">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>                    
                    @foreach($contacts as $index => $contact)
                    <tr>
                        <td>{{ $index + $contacts->firstItem() }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a href="{{ route('contact.edit', $contact) }}" class="btn btn-primary">Edit</a>      
                                <form action="{{ route('contact.delete', $contact) }}" method="POST">        
                                    @csrf
                                    @method('DELETE')      
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>            
                                    
                                </form> 
                                <a href="{{ route('contact.assign', $contact) }}" class="btn btn-warning">Assign to Agen</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                   
                </table>

                <div class="d-flex justify-content-between">
                    <div>
                        {{ $contacts->links() }}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
@endsection
