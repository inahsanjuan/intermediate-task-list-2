<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Http\Controllers\Controller;
use App\Http\Request;
use App\Repositories\TaskRepository;


class TaskController extends Controller
{

    protected $tasks;

    public function __construct()
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }

    public function index(Request $request)
    {
        $tasks = $request->user()->tasks()->get();

        return view('tasks.index', [
            'tasks' => $this->$tasks->forUser($request->user()),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);
    }

    return redirect('/tasks');
}
