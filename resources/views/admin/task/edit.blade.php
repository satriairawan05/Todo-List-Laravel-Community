@extends('admin.layouts.app')

@section('main')
    <section class="section">
        <div class="section-header">
            <h1>Task</h1>
        </div>

        <div class="section-body">
            <div class="card card-body text-dark">
                @include('admin.task._form',['action' => route('task.update',$task->id),'method' => 'put', 'task' => $task]);
            </div>
        </div>
    </section>
@endsection
