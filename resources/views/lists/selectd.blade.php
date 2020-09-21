<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form {{ route('lists.update', $list->id) }}" method="POST">

    @csrf

    <div class="form-group row">
        <label for="dropdown" class="col-sm-4 col-form-label text-md-right">{{ __('My dropdown') }}</label>

        <div class="col-md-12">
            <select name="dropdown">
              @foreach($todolist as $list)
              <option value="{{ $list->id }}">{{ $list->name }}</option>
              @endforeach
            </select>
        </div>
    </div>
</form>

</body>
</html>
