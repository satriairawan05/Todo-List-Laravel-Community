<div class="row">
    <div class="col-12">
        <form action="{{ $action }}" method="post" onsubmit="btnSubmit.disabled=true; return true;">
            @if ($method == 'put')
                @method('put')
            @endif
            @csrf
            <textarea name="body" id="body" cols="100" rows="50"
                class="form-control @error('body')
                is-invalid
            @enderror" placeholder="Enter Here...">{{ $task !== '' ? $task->body : '' }}</textarea>
            @error('body')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            @if ($task !== '')
                @php
                    $status = ['Completed', 'Pending','In Proggress'];
                @endphp
                <select name="status" class="form-control form-select mt-3" id="statusSelect"
                    aria-label="Default select example">
                    <option value="#">Please Select the Option</option>
                    @foreach ($status as $s)
                        @if ($s === $task->status)
                            <option value="{{ $s }}" selected>
                                {{ $s }}</option>
                        @else
                            <option value="{{ $s }}">
                                {{ $s }}</option>
                        @endif
                    @endforeach
                </select>
            @endif
            <div class="mt-3">
                <a href="{{ route('task.index') }}" class="btn btn-sm btn-warning"> <i class="fas fa-reply"></i></a>
                <button id="btnSubmit" type="submit" class="btn btn-sm btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
