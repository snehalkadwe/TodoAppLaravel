<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskComplete;

class TaskController extends Controller
{
    public function index(){

        // $lists = Auth::user()->todolist()->orderBy('completed_at', 'asc');
        $todos = TaskComplete::orderBy('completed_at', 'asc')->get();
        return view('/tasks', compact('todos'));
    }

    public function store(Request $request)
    {
        $todos = new TaskComplete();
        $todos->name = request('task');
        $todos->save();
        return view('tasks')->with('todos', $todos);
    }

     public function complete($id)
    {

        $todo = TaskComplete::find($id);
        // dd($todo);
        $todo->completed_at = now();
        $todo->save();
        // $todo->update(['completed' => true]);
        return redirect()->back()->with('message', 'Task Marked as completed!');
    }
     public function incomplete($id)
    {

        $todo = TaskComplete::find($id);
        // dd($todo);
        $todo->completed_at = null;
        $todo->save();
        // $todo->update(['completed' => true]);
        return redirect()->back()->with('message', 'Task Marked as completed!');
    }
}