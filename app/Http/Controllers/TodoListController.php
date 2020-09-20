<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;

class TodoListController extends Controller
{
    public function getlisttodos($id)
    {

        $todos = TodoList::findorFail($id)->todos;
        //  $todos = Todo::all();
        return view('todos.todo', compact('todos'));
    }
    public function index()
    {
        $lists = TodoList::all();
        return view('lists.index', compact('lists'));

    }
    public function create()
    {
        return view('lists.create');

    }
    public function store(Request $request)
    {
        $list = TodoList::create($request->all());
        return redirect('/lists')->with('success', 'List created');

    }

    public function show($id)
    {
       $list = TodoList::findorFail($id);
      return view('lists.show',compact('list'));
    }

    public function edit($id)
    {
      $list = TodoList::findorFail($id);
    //   return $list;
    return view('lists.edit', compact('list'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $list= TodoList::findorFail($id);
        $list->update($request->all());

        return redirect('lists')->with('success','List updated successfully');
    }
    public function destroy($id)
    {
        $list= TodoList::findorFail($id);
        $list->delete();

       return redirect('lists')
                       ->with('success','lists deleted successfully');
    }
}