<h1>snehal</h1>


<a href="/lists">Back</a>
@if($msg = Session::get('success'))
<p>{{ $msg }}</p>
@endif
<table class="table">
    <tr>
        <th>Sr No</th>
        <th>Description</th>
        <th>Due at</th>
        <th>Completed</th>
        <th>View</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
@foreach ($todos as $todo)
<tr>
    <td>{{ $todo->id }}</td>
    <td>{{ $todo->name }}</td>
    <td>{{ $todo->due_at }}</td>
    <td>{{ $todo->completed_at }}</td>
    <td><a href="{{ route('todos.show', $todo->id) }}">Show</a></td>
    <td><a href="{{ route('todos.edit', $todo->id) }}">Edit</a></td>
    <td>{{ $todo->id }} <a href="">Delete</a> </td>
</tr>

@endforeach
</table>
