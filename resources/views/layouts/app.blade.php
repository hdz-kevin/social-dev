<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SocialDev - @yield('title')</title>

    @stack('styles')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body class="bg-gray-100">
    <header class="border-b border-gray-300 p-5 bg-white shadow">
      <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-black">SocialDev</h1>

        <nav class="flex gap-4 items-center">
          @auth
            <a class="font-bold text-gray-600" href="{{ route('profile.show', auth()->user()->username) }}">
              Hello:
              <span class="font-normal">{{ auth()->user()->username }}</span>
            </a>

            <a class="flex items-center gap-2 bg-white border border-gray-400 p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer"
              href="{{ route('posts.create') }}">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
              </svg>
              Post              
            </a>

            <form action="{{ route('logout') }}" method="POST">
              @csrf

              <button type="submit" class="font-bold uppercase text-gray-600 cursor-pointer">
                Logout
              </button>
            </form>
          @endauth
          @guest
            <a class="font-bold uppercase text-gray-600" href="{{ route('login') }}">Login</a>
            <a class="font-bold uppercase text-gray-600" href="{{ route('register') }}">Register</a>
          @endguest
        </nav>
      </div>
    </header>

    <main class="container mx-auto mt-10">
      <h2 class="font-black text-center text-3xl mb-10">
        @yield('title')
      </h2>

      @yield('content')
    </main>

    <footer class="mt-10 text-center p-5 font-bold uppercase text-gray-500">
      <p>SocialDev - All rights reserved &copy; {{ now()->year }}</p>
    </footer>
  </body>
</html>
