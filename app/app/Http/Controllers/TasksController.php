<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Queue\RedisQueue;

class TasksController extends Controller
{

    public function getTasks(Request $request): object {
        if($request->completed) {
            return Task::select('title', 'isDone', 'created_at as created')
                ->where(['isDone' => '1'])
                ->get();
        }
        return Task::select('title', 'isDone', 'created_at as created')->get();
    }

    public function createTask(Request $request): void {
        $task = new Task;

        $request->validate([
            'title' => 'required',
        ]);

        $task->title = $request->title;
        $task->isDone = $request->isDone ?: 0;

        $task->save();
    }

    public function updateTask(Request $request): void { 

        $task = Task::where(['title' => $request->title])->first();

        $task->isDone = $request->isDone ?: 0;

        $task->save();
    }

    public function deleteTask(Request $request): void {
        $request->validate([
            'title' => 'required',
        ]);

        $task = Task::where(['title' => $request->title])->first();

        $task->delete();
    }
}
