@csrf

<h4>Data Contact</h4>

<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"  value="{{ $contact->name }}">
    @error('name')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $contact->phone }}">
    @error('phone')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $contact->email }}">
    @error('email')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<h4 class="mt-3 mb-3">Assign to agent</h4>

<div class="form-group">
    <label for="agen_id">Permissions</label>
    <select name="agen_id" id="agen_id" class="form-select">
        <option selected disabled>Choose a Agen</option>
        @foreach($agens as $agen)
            <option value="{{ $agen->id }}">{{ $agen->name }}</option>
        @endforeach
    </select>
    @error('agen')
    <div class="text-danger mt-1 d-block">{{ $message }}</div>
    @enderror
</div>
<input type="hidden" name="contact_id" id="contact_id" value="{{ $contact->id }}">



<button type="submit" class="btn btn-success mt-3">{{ $submit }}</button>