<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view("tasks.index", compact("tasks"));
    }

    public function create()
    {
        return view("tasks.create");
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "title" => "required|string|max:255",
            "description" => "nullable|string",
        ]);

        if ($validator->fails()) {
            return redirect()->route("tasks.create")
                ->withErrors($validator)
                ->withInput();
        }

        Task::create([
            "title" => $request->title,
            "description" => $request->description,
            "is_completed" => false,
        ]);

        return redirect()->route("tasks.index")
            ->with("success", "Task created successfully.");
    }

    public function edit(Task $task)
    {
        return view("tasks.edit", compact("task"));
    }

    public function update(Request $request, Task $task)
    {
        $validator = Validator::make($request->all(), [
            "title" => "required|string|max:255",
            "description" => "nullable|string",
            "is_completed" => "nullable|boolean",
        ]);

        if ($validator->fails()) {
            return redirect()->route("tasks.edit", $task->id)
                ->withErrors($validator)
                ->withInput();
        }

        $task->update([
            "title" => $request->title,
            "description" => $request->description,
            "is_completed" => $request->filled("is_completed"),
        ]);

        return redirect()->route("tasks.index")
            ->with("success", "Task updated successfully.");
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route("tasks.index")
            ->with("success", "Task deleted successfully.");
    }
}