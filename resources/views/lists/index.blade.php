@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Lists</h1>
@if($msg = Session::get('success'))
<p>{{ $msg }}</p>
@endif
<a href="{{ route('lists.create') }}">Create</a>
    <table class="table table-light">
        <thead>
            <tr>
                <th>Sr No</th>
                <th>List Name</th>
                <th>View</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

           @foreach ($todolist as $list)
                <tr><p>{{ $list->user_id }}</p>
                    <td>{{ $list->id }}</td>
                    <td><a href="/lists/{{ $list->id }}/todos/todo">{{ $list->name}}</a></td>
                    {{-- <td><a href="/lists/{{ $list->id }}/todo">{{ $list->name}}</a></td> --}}
                    <td><a href="{{ route('lists.show', $list->id) }}">Show</a></td>
                    <td><a href="{{ route('lists.edit', $list->id) }}">Edit</a></td>
                    <td>
                        <form action="{{route('lists.destroy', $list->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-primary" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
           @endforeach
        </tbody>
    </table>


</div>

@endsection
