<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <meta content="noindex, nofollow" name="robots">
    <title>プロフィール</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @if (!Request::routeIs('profile*'))
        @auth
            <header class="flex h-full">
                <div class="my-auto grow">
                    <nav class="flex justify-start">
                        <a class="mr-8" href="{{ route('qr.generate.form') }}">QRコード作成</a>
                        <a class="mr-8" href="{{ route('logout') }}">ログアウト</a>
                    </nav>
                </div>
            </header>
        @endauth
    @endif

    @yield('content')
</body>

</html>
