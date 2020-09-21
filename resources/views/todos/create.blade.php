@extends('layouts.app')

@section('content')

<div class="container col-md-7 mx-auto">
    <h1>Create Todo</h1>
    <a href="/todos/todo">back</a>
    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <div class="col-md-6 mx-auto mt-5">
            <div class="form-group row">
        <label for="dropdown" class="col-sm-4 col-form-label text-md-right">{{ __('My dropdown') }}</label>

        <div class="col-md-12">
            <select name="todolist_id">
              @foreach($todolist as $list)
              <option value="{{ $list->id }}">{{ $list->name }}</option>
              @endforeach
            </select>
        </div>
    </div>
    <br><br>
        <input type="text" name="name" class="form-control">
        <button type="submit">Save</button>
    </div>
    </form>
</div>

@endsection
