<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDo App</title>
    {{-- styleのリンクが入る --}}
    @yield('styles')
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<header>
    <nav class="my-navbar">
        <a class="my-navbar-brand" href="/">ToDo App</a>
        <div class="my-navbar-control">
            {{-- Authクラスのcheckメソッドでログインをしているかチェック 
                もしログインをしていたら--}}
            @if(Auth::check())
                {{-- ユーザーの名前表示 --}}
                <span class="my-navbar-item">ようこそ, {{ Auth::user()->name }}さん</span>
                ｜
                <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
            {{-- ログインできていなければログインか会員登録画面に行く --}}
            @else
                <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
                ｜
                <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
            @endif
        </div>
    </nav>
</header>
<main>
    {{-- mainのコードが入る --}}
    @yield('content')
</main>
{{-- もしログインがtrueであれば --}}
@if(Auth::check())
    <script>
        // ログアウトボタンが押されたら
        document.getElementById('logout').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('logout-form').submit();
        });
    </script>
@endif
@yield('scripts')
</body>
</html>