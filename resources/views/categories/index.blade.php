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

            <a href="{{ route('todos.index') }}">
                Todo一覧
            </a>
        </div>
    </header>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="error-message">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="container">

        <form action="{{ route('categories.store') }}" method="POST" class="create-form">
            @csrf

            <input
                type="text"
                name="name"
                placeholder="カテゴリ名"
                value="{{ old('name') }}"
            >

            <button type="submit">
                作成
            </button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>category</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach($categories as $category)
                <tr>

                    <td>
                        <form
                            action="{{ route('categories.update') }}"
                            method="POST"
                            class="inline-form">

                            @csrf
                            @method('PATCH')

                            <input
                                type="hidden"
                                name="id"
                                value="{{ $category->id }}"
                            >

                            <input
                                type="text"
                                name="name"
                                value="{{ $category->name }}"
                                class="edit-input"
                            >

                            <button class="update-btn">
                                更新
                            </button>
                        </form>
                    </td>

                    <td>
                        <form
                            action="{{ route('categories.destroy') }}"
                            method="POST">

                            @csrf
                            @method('DELETE')

                            <input
                                type="hidden"
                                name="id"
                                value="{{ $category->id }}"
                            >

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


