@extends('layouts.app')

@section('content')
    <h1>Show Todo</h1>
   <p>
      <ul>
          <li>{{ $todo->id }}</li>
      <li>{{ $todo->name }}</li>
      <li>{{ $todo->due_at }}</li>
      <li>{{ $todo->completed_at }}</li>
      </ul>
    </p>
    @endsection
