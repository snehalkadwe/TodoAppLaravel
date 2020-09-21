<?php

namespace App\Http\Requests;

use App\Models\TodoList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class TodoListRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(! $this->route('todolist'))
        {
            // dd(! $this->route('todolist'));
            return true;
        }

        $todolist = $this->route('todolist');
        $todolist->user_id == Auth::user()->id;
        // dd($todolist->user_id == Auth::user()->id);
        return $todolist->user_id == Auth::user()->id;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|unique:todo_lists',
        ];
    }
}
