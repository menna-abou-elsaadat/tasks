<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Services\TaskService;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\Models\Task;
use RealRashid\SweetAlert\Facades\Alert;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Task!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('tasks.tasks_table', [
            'tasks' => Auth::user()->tasks()->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create_task');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $validated = $request->validated();
        $task = TaskService::createTask($request->name,Auth::user()->id);
        alert()->success('Created', 'The task was created');
        return Redirect::route('tasks.index')->with('status', 'task-created');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::find($id);
        return view('tasks.edit_task',['task'=>$task]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, string $id)
    {
        $validated = $request->validated();
        $task = Task::find($id);
        $updated_task = TaskService::updateTask($task,$request->name);
        alert()->success('Updated', 'The task was updated');
        return Redirect::route('tasks.index')->with('status', 'task-updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);
        TaskService::deleteTask($task);
        alert()->success('Deleted', 'The task was deleted');
        return Redirect::route('tasks.index')->with('status', 'task-deleted');
    }
}
