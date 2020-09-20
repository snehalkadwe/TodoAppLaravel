@extends('layouts.app')

@section('content')
    <h1>List</h1>
    {{ $list->id }}
    {{ $list->name}}
@endsection
