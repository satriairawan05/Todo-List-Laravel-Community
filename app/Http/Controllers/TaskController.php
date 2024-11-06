<?php

namespace App\Http\Controllers;

use App\Enum\TaskStatus;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->input('status')) {
            $task = Task::select('user_id', 'id', 'body', 'status')->where('user_id', auth()->user()->id)->where('status', '=', request()->input('status'))->latest('id')->paginate();
        } else {
            $task = Task::select('user_id', 'id', 'body', 'status')->where('user_id', auth()->user()->id)->latest('id')->paginate();
        }

        return view('admin.task.index', [
            'task' => $task
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Task::create([
            'body' => $request->input('body'),
            'user_id' => auth()->user()->id,
            'status' => TaskStatus::Created
        ]);

        return redirect()->to(route('task.index'))->with('success', 'Data Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        if ($task->status === 'Pending') {
            return redirect()->to(route('task.index'))->with('failed', 'Your Task is Pending!');
        } else if ($task->status === 'Completed') {
            return redirect()->to(route('task.index'))->with('failed', 'Your Task is Completed!');
        } else {
            return view('admin.task.edit', ['task' => $task]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        Task::where('id', $task->id)->update([
            'body' => $request->input('body'),
            'user_id' => auth()->user()->id,
            'status' => $request->input('status')
        ]);

        return redirect()->to(route('task.index'))->with('success', 'Data Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if ($task->status === 'Pending') {
            return redirect()->to(route('task.index'))->with('failed', 'Your Task is Pending!');
        } else if ($task->status === 'Completed') {
            return redirect()->to(route('task.index'))->with('failed', 'Your Task is Completed!');
        } else if($task->status === 'In Proggrss') {
            return redirect()->to(route('task.index'))->with('failed', 'Your Task is In Proggress!');
        } else {
            Task::destroy($task->id);

            return redirect()->to(route('task.index'))->with('success', 'Data Deleted!');
        }
    }

    public function status(Task $task)
    {
        if ($task->status === 'Completed') {
            return redirect()->to(route('task.index'))->with('success', 'Your Task is Completed!');
        }

        return view('admin.task.status', ['task' => $task]);
    }

    public function updateStatus(Task $task, Request $request)
    {
        if($task->status != 'Completed'){
            if ($request->input('status')) {
                Task::where('id', $task->id)->update([
                    'status' => TaskStatus::Completed
                ]);
            }
            return redirect()->to(route('task.index'))->with('success', 'Data ' . $task->body . ' Completed!');
        } else {
            return redirect()->to(route('task.index'))->with('success', 'Your Task is Completed!');
        }
    }
}
