<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\TodoList;




class TodoListController extends Controller
{

    public function index() {

        $filters = $this->getFilters();

        return Inertia::render('Home', [
            'user' => auth()->user(),
            'mine_or_all' => $filters['mine_or_all'],
            'page' => $filters['page']
        ]);

    }

    public function store() {

        $todo_list = new TodoList;

        $todo_list->user_id = auth()->user()->id;
        $todo_list->name = request('name');
        $todo_list->save();

    }

    public function update() {

        $list_id = intval(request('list_id'));

        $todo_list = TodoList::find($list_id);
        $todo_list->name = request('list_name');
        $todo_list->save();
    }

    private function getFilters() {

        $filters = ['mine_or_all' => 'mine', 'page' => 1];

        if (request('mine_or_all')) $filters['mine_or_all'] = request('mine_or_all') === 'mine' || request('mine_or_all') === 'all' ? request('mine_or_all') : 'mine';

        if (intval(request('page')) > 1) $filters['page'] = intval(request('page'));

        return $filters;
    }


    public function getTodoLists() {

        $filters = $this->getFilters();

        if ($filters['mine_or_all'] === 'mine') {
            $todo_lists = TodoList::with(['user' => function ($query) {
                $query->select('id', 'name');
            }])->where('user_id', '=', auth()->user()->id)->paginate(10);
        }
        elseif ($filters['mine_or_all'] === 'all') {
            $todo_lists = TodoList::with(['user' => function ($query) {
                $query->select('id', 'name');
            }])->paginate(10);
        }

        return $todo_lists;

    }


    public function destroy($list_id) {

        TodoList::destroy(intval($list_id));

    }



}
