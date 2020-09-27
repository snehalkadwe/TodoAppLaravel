                    @if($todo->completed_at)
                       <input type="checkbox" onclick="event.preventDefault();
                                    document.getElementById('form-incomplete-{{$todo->id}}')
                                    .submit()" />
                    <br>
                    <form style="display:none" id="{{'form-incomplete-'.$todo->id}}" method="post" action="{{route('todos.incomplete',$todo->id)}}">
                    @csrf
                    @method('delete')
                    </form>
                    @else

                    <input type="checkbox" onclick="event.preventDefault();
                                    document.getElementById('form-complete-{{$todo->id}}')
                                    .submit()" />
                    <br>
                    <form style="display:none" id="{{'form-complete-'.$todo->id}}" method="post" action="{{route('todos.complete',$todo->id)}}">
                    @csrf
                    @method('put')
                    </form>
                    @endif
