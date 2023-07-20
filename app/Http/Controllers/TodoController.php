<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;


class TodoController extends Controller
{


    public function getTodos() {
        return Todo::where('todo_list_id', '=', request('todo_list_id'))->get();
    }
    
    public function store() {

        $list_id = intval(request('list_id'));

        $todo = new Todo;
        $todo->todo_list_id = $list_id;
        $todo->what_todo = request('what_todo');
        $todo->completed = 0;

        $todo->save();
    }


    public function changeTodoCompleted() {

        $todo_id = intval(request('todo_id'));
        $completed = request('completed') === 1 ? 1 : 0;

        $todo = Todo::find($todo_id);
        $todo->completed = $completed;
        $todo->save();

    }

    public function update() {

        $todo_id = intval(request('todo_id'));

        $todo = Todo::find($todo_id);
        $todo->what_todo = request('what_todo');
        $todo->save();

    }


    public function destroy($id) {
        Todo::destroy(intval($id));
    }

}
