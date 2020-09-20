@extends('layouts.app')

@section('content')

<div class="container col-md-7 mx-auto">
    <h1>Create List</h1>
    <a href="/lists">back</a>
    <form action="{{ route('lists.store') }}" method="POST">
        @csrf
        <div class="col-md-6 mx-auto mt-5">
        <input type="text" name="name" class="form-control">
        <button type="submit">Save</button>
    </div>
    </form>
</div>

@endsection
