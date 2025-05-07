<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SocialDev - @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body class="bg-gray-100">
    <header class="border-b border-gray-300 p-5 bg-white shadow">
      <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-black">SocialDev</h1>

        <nav class="flex gap-3 items-center">
          <a class="font-bold uppercase text-gray-600" href="#">Login</a>
          <a class="font-bold uppercase text-gray-600" href="{{ route('register.create') }}">Register</a>
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
