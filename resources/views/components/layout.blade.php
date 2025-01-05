<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>

<nav class="bg-purple-500 text-white p-4 flex items-center justify-between">
    <!-- Navigation Links -->
    <div class="flex space-x-4">
        <a href="/" class="text-white hover:text-blue-400  px-3 py-2 rounded-md text-sm font-medium">Home</a>
        <a href="/games" class="text-white hover:text-blue-400 px-3 py-2 rounded-md text-sm font-medium">Tetris Games
            Overview</a>

    </div>

    <!-- Authentication -->
    <div class="flex row">
        @if (auth()->check() && auth()->user()->role == 1)
            <a href="/admin" class="text-white hover:text-blue-400  px-3 py-2 rounded-md text-sm font-medium">
                Admin overview
            </a>

        @endif


        @if(auth()->check())
            <a href="/profile"
               class="text-white hover:text-blue-400  px-3 py-2 rounded-md text-sm font-medium">{{ Auth::user()->name }}</a>

            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf

                <x-dropdown-link :href="route('logout')"
                                 class="text-white hover:text-black px-3 py-2 rounded-md text-sm font-medium"
                                 onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        @else
            <a href="/login"
               class="text-white hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</a>

            <a href="/register"
               class="text-white hover:text-white px-3 py-2 rounded-md text-sm font-medium">Register</a>

        @endif

    </div>

</nav>

<main class="p-8">
    {{ $slot  }}
</main>

</body>
</html>
