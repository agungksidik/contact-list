<div>
    <div class="row justify-content-between mb-4">
        <div class="col-md-3">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-6 col-form-label">Show perpage: </label>
                <div class="col-sm-4">
                    <select wire:model="perPage" class="form-select">
                        <option value="9">9</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                    </select>
                </div>
            </div>            
        </div>
        <div class="col-md-4">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Search: </label>
                <div class="col-sm-9">
                    <input type="text" wire:model="query" class="form-control" placeholder="search ...">
                </div>
            </div>                
        </div>
    </div> 
    <div class="row">               
        @foreach($contacts as $index => $contact)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header fw-bold">
                        <div class="d-flex justify-content-between align-content-center">
                            <h5>{{ $contact->name }}</h5>                        
                            @if (App\Models\Task::where('contact_id', '=', $contact->id)->count() !== 0)
                                <span class="badge rounded-pill bg-success">has assigned</span>
                            @endif
                        </div>

                    </div>
                        <div class="card-body">
                            <div class="media">
                                <h5 class="text-secondary mb-0">{{ $contact->phone }}</h5>
                                <div class="media-body">
                                    <h5 class="text-secondary">{{ $contact->email }}</h5>
                            </div>
                            <div class="row d-flex justify-content-between mt-4">
                                <div class="col-md-9">
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a href="{{ route('contact.edit', $contact) }}" class="btn btn-primary">Edit</a>
                                        @if (App\Models\Task::where('contact_id', '=', $contact->id)->count() !== 0)
                                            <button type="button" class="btn btn-secondary" disabled>has assigned</button>
                                        @else
                                            <a href="{{ route('contact.assign', $contact) }}" class="btn btn-warning">Assign to Agen</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <form action="{{ route('contact.delete', $contact) }}" method="POST">        
                                        @csrf
                                        @method('DELETE')      
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>                            
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-between">
        <div>
            {{ $contacts->links() }}
        </div>
        <div class="fw-bold">
            Show {{ $contacts->firstItem() }} to {{ $contacts->lastItem() }} From total {{ $contacts->total() }}
        </div>        
    </div>
</div>
