@extends('admin.layouts.app')

@section('main')
    <section class="section">
        <div class="section-header">
            <h1>Task</h1>
        </div>

        <div class="section-body">
            @if (session('success'))
                <div class="row col-12">
                    <p class="alert alert-success text-dark">{{ session('success') }}</p>
                    <div class="alert-dismissible"></div>
                </div>
            @endif
            <div class="card card-body text-dark">
                <div class="row col-12">
                    <div class="mb-3">
                        <form action="{{ route('task.index') }}" method="get">
                            @csrf
                            @php
                                $status = ['Created', 'Completed', 'Pending','In Proggress'];
                                foreach ($task as $t) {
                                    $statusTask = $t->status;
                                }
                            @endphp
                                <select name="status" class="form-select mx-2" id="statusSelect"
                                    aria-label="Default select example">
                                    @foreach ($status as $s)
                                        @if ($s == $statusTask)
                                            <option value="{{ $s }}" selected>
                                                {{ $s }}</option>
                                        @else
                                            <option value="{{ $s }}">
                                                {{ $s }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-sm btn-success">Submit</button>
                        </form>
                    </div>
                    <div class="mx-2">
                        <a href="{{ route('task.create') }}" class="btn btn-sm btn-primary"><i
                                class="fas fa-plus-circle"></i></a>
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Todo</th>
                            <th scope="col">Status</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($task as $t)
                            <tr>
                                <th scope="row" class="{{ $t->status !== 'Completed' ? 'text-primary text-bold' : 'text-bold' }}">
                                    {{ $loop->iteration + ($task->currentPage() - 1) * $task->perPage() }}</th>
                                <td id="taskList" class="{{ $t->status !== 'Completed' ? 'text-primary text-bold' : 'text-bold' }}">
                                    {{ $t->body }}</td>
                                <td class="{{ $t->status !== 'Completed' ? 'text-primary text-bold' : 'text-bold' }}">
                                    {{ $t->status }}</td>
                                <td>
                                    @if ($t->status != 'Completed')
                                        <a href="{{ route('task.status', $t->id) }}" class="btn btn-sm btn-primary">Update
                                            Status</a>
                                        @if ($t->status != 'Pending')
                                            <a href="{{ route('task.edit', $t->id) }}" class="btn btn-sm btn-warning"><i
                                                    class="fas fa-edit"></i></a>
                                            <form action="{{ route('task.destroy', $t->id) }}" method="post"
                                                class="d-inline-block">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


                {{ $task->links() }}
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script type="text/javascript">
        const formStatus = document.getElementById('formStatus');

        fornStatus.addEventListener('click', function(e) {
            console.log('button di klik');
        });
    </script>
@endpush
