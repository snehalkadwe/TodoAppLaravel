@extends('layouts.app')

@section('content')
    <h1>Edit List</h1>
    <a href="/lists">back</a>
    <form action="{{ route('lists.update', $list->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-md-6 mx-auto mt-5">
            {{ $list->id }}
        <input type="text" name="name" class="form-control" value="{{ $list->name }}">
        <button type="submit">Update</button>
    </div>
    </form>
@endsection
