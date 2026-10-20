<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        //Todoの表示
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function store(TodoRequest $request)
    {
        //Todoの追加
        $validated = $request->validated();
        $todo = Todo::create($validated);

        return redirect()->route('todos.index')->with('success', 'Todoを作成しました');

    }

    public function update(TodoRequest $request, Todo $todo)
    {
        //Todoの更新
        $validated = $request->validated();
        $todo->update($validated);

        return redirect()->route('todos.index')->with('success', 'Todoを更新しました');
    }

    public function destroy(Todo $todo)
    {
        //Todoの削除
        $todo->delete();

        return redirect()->route('todos.index')->with('success', 'Todoを削除しました');
    }
}
