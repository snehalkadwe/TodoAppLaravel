<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::orderBy('completed_at', 'asc')->get();
        return view('todos.index', compact('todos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $todolist = Auth::user()->todolist()->get();
        return view('todos.create', compact('todolist'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todos = new Todo();
        $todos->name = $request->input('name');
        $todos->todo_list_id  = $request->input('todolist_id');
        $todos->save();
        return view('todos.index')->with('todos', $todos);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        // return view('todos.show',['todo' => Todo::findorFail($is)]);
        return view('todos.show',compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
         $request->validate([
            'name' => 'required'
        ]);

        // $todo= Todo::findorFail($todo);
        $todo->update($request->all());

        return redirect('todos')->with('success','List updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

       return redirect()->route('todos.index')
                       ->with('success','lists deleted successfully');
    }

    public function complete(Todo $todo)
    {
        // $todo->update(['completed_at' => now()]);
        $todo->completed_at = now();
        $todo->save();
        return redirect()->back()->with('message', 'Task Marked as completed!');
    }

    public function incomplete(Todo $todo)
    {
        $todo->completed_at = null;
        $todo->save();
        return redirect()->back()->with('message', 'Task Marked as Incompleted!');
    }

}