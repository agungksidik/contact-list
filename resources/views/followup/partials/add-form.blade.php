@csrf
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="follow_up_date">Date</label>
            <input type="text" name="follow_up_date" id="follow_up_date" class="form-control @error('follow_up_date') is-invalid @enderror" placeholder="2021-05-25">
            @error('follow_up_date')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="status">Select Status</label>
                <select class="form-select @error('status') is-invalid @enderror" name="status" id="status" aria-label="Default select example" required>
                    <option value="">Select Status</option>
                    <option value="uncontacted" @if (old('status') == "uncontacted") {{ 'selected' }} @endif>Uncontacted</option>
                    <option value="pending" @if (old('status') == "pending") {{ 'selected' }} @endif>Pending</option>
                    <option value="qualified" @if (old('status') == "qualified") {{ 'selected' }} @endif>Qualified</option> 
                    <option value="lost" @if (old('status') == "lost") {{ 'selected' }} @endif>Lost</option> 
                </select>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror            
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="remark" class="form-label">Remark</label>
            <textarea name="remark" id="remark" class="form-control @error('remark') is-invalid @enderror" rows="3"></textarea>
            @error('remark')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<input type="hidden" name="task_id" id="task_id" value="{{ $task->id }}">
<button type="submit" class="btn btn-success mt-3">Submit</button>
