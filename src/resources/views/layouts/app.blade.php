<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todo</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>
<body>
    <header id="header">
        <h1 class="site-title">
            <a href="/">todo</a>
        </h1>
        <a href="/categories" class="link">カテゴリ一覧</a>
        
    </header>
    
    <main>
    @yield('content')
</main>
</body>

</html>