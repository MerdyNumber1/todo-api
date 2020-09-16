<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Queue\RedisQueue;

class TasksController extends Controller
{
    public function getTasks(): array {
        return Task::all();
    }

    public function createTask(Request $request): void {
        $task = new Task;

        $task->title = $request->title;
        $task->isDone = $request->isDone;

        $task->save();
    }

    public function updateTask(Request $request): void {
        $task = Task::find($request->id);

        $task->isDone = $request->isDone;

        $task->save();
    }
}
