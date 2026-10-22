<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use App\Models\Category;

class TodoController extends Controller
{
    public function index()
    {
        //dd('index method');

        //Todoの表示
        $todos = Todo::with('category')->get();
        $categories = Category::all();
        return view('todos.index', compact('todos', 'categories'));
    }

    public function store(TodoRequest $request)
    {
        //dd($request->all());

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

    public function search(Request $request)
    {
        //Todoの検索
        $query = Todo::query()->with('category');

        if ($request->filled('keyword')) {
            $query->where(
                'content',
                'like',
                '%' . $request->keyword . '%'
            );
        }

        if ($request->filled('category_id')) {
            $query->where(
                'category_id',
                $request->category_id
            );
        }

        $todos = $query->get();

        $categories = Category::all();

        return view('todos.index', compact('todos', 'categories'));
    }

}
