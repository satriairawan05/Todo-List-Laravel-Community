<?php

namespace App\Http\Controllers;

use App\Enum\TaskStatus;
use App\Models\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home',[
            'taskCreated' => Task::where('user_id', auth()->user()->id)->where('status', '=', TaskStatus::Created)->count(),
            'taskCompleted' => Task::where('user_id', auth()->user()->id)->where('status', '=', TaskStatus::Completed)->count(),
            'taskPending' => Task::where('user_id', auth()->user()->id)->where('status', '=', TaskStatus::Pending)->count(),
            'taskProggress' => Task::where('user_id', auth()->user()->id)->where('status', '=', TaskStatus::InProggress)->count(),
            'taskTotal' => Task::where('user_id', auth()->user()->id)->count()
        ]);
    }
}
