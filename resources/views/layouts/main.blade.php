<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="container">
<main>
    <div class="container">
        <nav class="navbar bg-primary navbar-expand-lg mt-2 mb-4 rounded-2" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('posts.index')}}">Posts</a>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('posts.create') ? 'active' : '' }}" href="{{route('posts.create')}}">Create</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <footer class="pt-3 mt-4 text-body-secondary border-top">
            © 2023
        </footer>
    </div>
</main>
</body>
</html>
