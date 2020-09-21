<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TodoListRequest;
use App\Http\Resources\TodoListResource;

class TodoListController extends Controller
{
    public function getlisttodos($todolist)
    {

        $todos = TodoList::findorFail($todolist)->todos;
        //  $todos = Todo::all();
        return view('todos.todo', compact('todos'));
    }

    public function index()
    {
        // $lists = Auth::user()->todolist()->orderBy('completed_at', 'asc');
        // $lists = TodoList::all();
        // return view('lists.index', compact('lists'));

        $user = Auth::user();
        $todolist = $user->todolist->all();
        //return TodoListResource::collection($todolist);
        return view('lists.index', compact('todolist'));
    }

    public function create()
    {
        return view('lists.create');

    }
    public function store(TodoListRequest $request)
    {
        // $list = TodoList::create($request->all());
        // return redirect('/lists')->with('success', 'List created');
         $todolist = new TodoList();
            $todolist->name = $request->input('name');
            $todolist->user_id = Auth::user()->id;
            $todolist->save();
            return new TodoListResource($todolist);

    }

    public function show(TodoList $todolist)
    {
       $list = TodoList::findorFail($todolist);
      return view('lists.show',compact('list'));
    }

    public function edit($id)
    {
      $list = TodoList::find($id);
    //   return $list;
    return view('lists.edit', compact('list'));
    }

    public function update(TodoListRequest $request, TodoList $todolist)
    {

        // $todolist= TodoList::find($todolist);
        $todolist->update($request->all());
        return new TodoListResource($todolist);

        //return redirect('lists')->with('success','List updated successfully');
    }
    public function destroy(TodoList $todolist)
    {
    //     $list= TodoList::findorFail($todolist);
    //     $list->delete();

    //    return redirect('lists')
    //                    ->with('success','lists deleted successfully');

         $todolist->delete();
        return response()->json(['status', 'todo list deleted']);
    }

    public function getdropdownlist()
    {
        $todolist = Auth::user()->todolist()->get();
        return view('lists.snehal', compact('todolist'));
        // return new TodoListResource($todolist);
    }

}



// <form action={{ route('tasks.update', $task->id) }} method="POST">
//     @method('PATCH')
//     @csrf
//     <input type="hidden" name="completed" value="1" />
//     <button     type="submit">Complete</button>
// </form>

// <li class = "list-group-item {{ $task->completed ? 'strike' : '' }}">
//     {{ $tasks->task }}
//     <span>
//         <button>
//             <i class="fa fa-close" style="font-size:12px;color:red"></i>
//         </button>
// </span>
// </li>
