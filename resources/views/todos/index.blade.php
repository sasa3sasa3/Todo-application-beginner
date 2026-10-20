<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todoアプリ</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1 class="header-h1">Todo</h1>
        @if (session('success'))
            <p class="header-success">{{ session('success') }}</p>
        @endif

        @if ($errors->any())
            <ul class="header-error">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </header>

    <div class="container">

    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <input type="text" name="content" placeholder="Todoを追加">
        <button class="create-button" type="submit">作成</button>
    </form>

    <h2>Todo</h2>

    <ul>
        @foreach ($todos as $todo)
            <li class="todo-list">
                {{ $todo->content }}
                <form class="todo-item" action="{{ route('todos.update', $todo) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <input type="text" name="content" value="{{ $todo->content }}">
                    <button class="update-button" type="submit">更新</button>
                </form>
                <form class="todo-item" action="{{ route('todos.destroy', $todo) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="delete-button" type="submit">削除</button>
                </form>
            </li>
        @endforeach
    </ul>
    </div>
</body>
</html>