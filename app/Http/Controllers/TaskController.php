<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('priority')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(StoreTaskRequest $request)
    {
        try {
            Task::create($request->validated());
            return redirect()->route('tasks.index')->with('success', 'The Task is Created.');
        } catch (\Exception $exception) {
            return redirect()->route('tasks.create')->with('error', 'There was an issue.');
        }

    }
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(UpdateTaskRequest $request,Task $task)
    {
        try {
            $task->update($request->validated());
            return redirect()->route('tasks.index')->with('success', 'The Task is Updated.');
        } catch (\Exception $exception) {
            return redirect()->route('tasks.edit', $task)->with('error', 'There was an issue.');
        }

    }

    public function destroy(Task $task)
    {
        try {
            Task::where('priority', '>', $task->priority)->update(['priority' => \DB::raw('priority -1')]);
            $task->delete();
            return redirect()->route('tasks.index')->with('success', 'The Task is deleted.');
        } catch (\Exception $exception){
            return redirect()->route('tasks.index')->with('error', 'There was an issue.');
        }
    }
}
