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
    <td>@include('todos.todo-complete')</td>
    <td><a href="{{ route('todos.show', $todo->id) }}">Show
                {{-- @if($todo->completed_at)
                <p style="color:red">{{$todo->name}}</p>
                @endif --}}
    </td>
    <td><a href="{{ route('todos.edit', $todo->id) }}">Edit</a></td>
    <td><form action="{{ route('todos.destroy', $todo->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
</tr>

@endforeach
</table>
