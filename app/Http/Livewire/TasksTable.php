<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;

class TasksTable extends Component
{
    public function render()
    {
        $tasks = Task::orderBy('priority')->get();
        return view('livewire.tasks-table', compact('tasks'));
    }

    public function updateTaskOrder($tasks)
    {
        foreach ($tasks as $task){
            Task::find($task['value'])->update(['priority' => $task['order']]);
        }
    }
}
