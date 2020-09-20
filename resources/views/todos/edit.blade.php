@extends('layouts.app')

@section('content')
    <h1>Edit Todo</h1>
    <a href="/todos">back</a>
    <form action="{{ route('todos.update', $todo) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-md-6 mx-auto mt-5">
            {{ $todo->id }}
        <input type="text" name="name" class="form-control" value="{{ $todo->name }}">
        <button type="submit">Update</button>
    </div>
    </form>
@endsection
