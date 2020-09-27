
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <center>
        <h1>Task Controller</h1>
        <br><br><br><br>

        @foreach ($todos as $todo)
                @if($todo->completed_at)
                <p style="color:red">{{$todo->name}}</p>
                @else
                <a class="cursor-pointer" href=""></a>
                @endif
                {{ $todo->name }}
                      @if($todo->completed_at === '')
                       <input type="checkbox" onclick="event.preventDefault();
                                    document.getElementById('form-incomplete-{{$todo->id}}')
                                    .submit()" />
                    <br>
                    <form style="display:none" id="{{'form-incomplete-'.$todo->id}}" method="post" action="{{route('tasks.incomplete',$todo->id)}}">
                    @csrf
                    @method('delete')
                    </form>
                    @else

                    <input type="checkbox" onclick="event.preventDefault();
                                    document.getElementById('form-complete-{{$todo->id}}')
                                    .submit()" />
                    <br>
                    <form style="display:none" id="{{'form-complete-'.$todo->id}}" method="post" action="{{route('tasks.complete',$todo->id)}}">
                    @csrf
                    @method('put')
                    </form>
                    @endif
        @endforeach
        <br><br><br><br>



        <br><br><br><br>
        <br><br><br><br>


        <form method="POST" action="{{ route('tasks')}}">
            @csrf
           <label>Name of Task : </label>
           <input type="text" name="task">
           <button type="submit">Save</button>
        </form>


    </center>
    <script>
        function snehal()
        {
            var c = document.getElementById('completed_at');
            alert("incompleted");
        }
//         function doalert(getCheckEvent) {
//   if (getCheckEvent.checked) {
//     alert ("completed");
//   } else {
//     alert ("incompleted");
//   }
// }
    </script>
</body>
</html>
