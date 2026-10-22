<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    //カテゴリ一覧の表示
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));

    }

    //カテゴリの追加
    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();
        $category = Category::create($validated);

        return redirect()->route('categories.index')->with('success', 'カテゴリを作成しました');
    }

    //カテゴリの更新
    public function update(CategoryRequest $request)
    {
        $validated = $request->validated();
        $category = Category::find($request->id);
        $category->update($validated);

        return redirect()->route('categories.index')->with('success', 'カテゴリを更新しました');

    }

    //カテゴリの削除
    public function destroy(Request $request)
    {
        $category = Category::findOrFail($request->id);
        
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'カテゴリを削除しました');

    }
}
