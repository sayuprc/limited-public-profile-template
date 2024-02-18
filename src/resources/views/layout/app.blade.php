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
            <div class="bg-white lg:pb-12">
                <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                    <header class="flex items-center justify-between py-4 md:py-8">
                        <nav class="lg:right gap-12">
                            <a class="mr-8 text-lg font-semibold text-gray-600 transition duration-100"
                                href="{{ route('qr.index') }}">一覧</a>
                            <a class="mr-8 text-lg font-semibold text-gray-600 transition duration-100"
                                href="{{ route('qr.generate.form') }}">作成</a>
                            <a class="mr-8 text-lg font-semibold text-gray-600 transition duration-100"
                                href="{{ route('logout') }}">ログアウト</a>
                        </nav>
                    </header>
                </div>
            </div>
        @endauth
    @endif

    @yield('content')
</body>

</html>
