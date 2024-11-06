@extends('admin.layouts.app')

@section('main')
    <section class="section">
        <div class="section-header">
            <h1>Task</h1>
        </div>

        <div class="section-body">
            <div class="card card-body text-dark">
                <div class="row">
                    <form action="{{ route('task.updateStatus', $task->id) }}" method="post">
                        @method('put')
                        @csrf
                        <textarea name="body" id="body" cols="100" rows="50" disabled
                            class="form-control @error('body')
                is-invalid
            @enderror" placeholder="Enter Here...">{{ $task !== '' ? $task->body : '' }}</textarea>
                        <div class="mb-3 mt-3">
                            <select name="status" class="form-select" id="statusSelect"
                                aria-label="Default select example">
                                <option value="Completed" selected>
                                    Completed</option>
                            </select>
                        </div>
                        <a href="{{ route('task.index') }}" class="btn btn-sm btn-warning"> <i class="fas fa-reply"></i></a>
                        <button type="submit" class="btn btn-sm btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
