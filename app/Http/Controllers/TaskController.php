<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;


class TaskController extends Controller
{
    protected $tasks;

    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }

    public function index(Request $request)
    {
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:30',
            'content' => 'required|max:255',
            ]);

        auth()->user()->tasks()->create([
            'title' => $request->title,
            'content' => $request->content, 
            ]);

        //$request->session()->flash('message', 'Successfully Added!');
        return redirect('/tasks');
    }

    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);
        $task->delete();
        return redirect('/view');
    }

    public function view(Request $request)
    {
        return view('tasks.view', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    public function status(Request $request, Task $task)
    {
        $stat = task::find($task->id);
        $stat->status = $request->status;
        $stat->save();
        return redirect('/view');
    }

    public function edit(Request $request, Task $task)
    {
        return view('tasks.edit')->with('task',$task);
    }

    public function update(Request $request, Task $task)
    {
        $upd =task::find($task);
        $upd->title = $request->title;
        $upd->content = $request->content;
        $upd->save();
        return redirect('/view');
    }
}
