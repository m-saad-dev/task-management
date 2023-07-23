<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        $priority = Task::max('priority');
        $request->merge(['priority' => $priority + 1]);
        $validator = Validator::make($request->all(), Task::$createRules);
        if ($validator->fails()){
            DB::rollBack();
            return redirect()
                ->route('tasks.create')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            Task::create($request->all());
            return redirect()->route('tasks.index')->with('success', 'The Task is Created.');
        } catch (\Exception $exception) {
            return redirect()->route('tasks.create')->with('error', 'There was an issue.');
        }

    }
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request,Task $task)
    {
        $request->merge(['priority' => $task->priority]);
        $validator = Validator::make($request->all(), Task::$editRules);
        if ($validator->fails()){
            DB::rollBack();
            return redirect()
                ->route('tasks.edit', $task)
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $task->update(['name' => $request->name]);
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
