<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="header">
        <div class="header-inner">
            <h1>Todo</h1>

            <a href="{{ route('categories.index') }}">
                カテゴリ一覧
            </a>
        </div>
    </header>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="error-message">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="container">

        <h2>新規作成</h2>

        <form action="{{ route('todos.store') }}" method="POST" class="form-row">
            @csrf

            <input
                type="text"
                name="content"
                value="{{ old('content') }}"
            >

            <select name="category_id">
                <option value="">カテゴリ</option>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit">
                作成
            </button>
        </form>

        <h2>Todo検索</h2>

        <form action="{{ route('todos.search') }}" method="GET" class="form-row">

            <input
                type="text"
                name="keyword"
            >

            <select name="category_id">
                <option value="">
                    カテゴリ
                </option>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit">
                検索
            </button>

        </form>

        <table>
            <thead>
                <tr>
                    <th>Todo</th>
                    <th>カテゴリ</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>

                @foreach($todos as $todo)
                <tr>
                    <!--<td>{{ $todo->content }}</td>
                    <td>{{ $todo->category->name }}</td>
                    <td>
                    -->
                    
                    <td colspan="3">
                        <form 
                            class="todo-item" 
                            action="{{ route('todos.update', $todo) }}" 
                            method="POST" 
                            style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <input type="text" name="content" value="{{ $todo->content }}">

                            <select name="category_id">
                                @foreach($categories as $category)
                                    <option
                                        value="{{$category->id}}"
                                        @selected($todo->category_id == $category->id)>
                                        {{$category->name}}
                                    </option>
                                @endforeach
                            </select>
                    
                            <button class="update-button" type="submit">更新</button>
                        </form>

                        <form
                            action="{{ route('todos.destroy',$todo) }}"
                            method="POST"
                            class="inline-form">

                            @csrf
                            @method('DELETE')

                            <button class="delete-btn">
                                削除
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</body>
</html>
