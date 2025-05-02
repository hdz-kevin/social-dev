<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SocialDev - @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
      body {
        background-color: #222222;
        color: #f1f1f1;
      }
    </style>
  </head>

  <body>
    <header class="p-5 shadow bg-[#303030]">
      <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-black">SocialDev</h1>

        <nav class="flex gap-3 items-center">
          <a class="font-bold uppercase text-gray-100" href="#">Login</a>
          <a class="font-bold uppercase text-gray-100" href="{{ route('register') }}">Register</a>
        </nav>
      </div>
    </header>

    <main class="container mx-auto mt-10">
      <h2 class="font-black text-center text-3xl mb-10">
        @yield('title')
      </h2>

      @yield('content')
    </main>

    <footer class="mt-10 text-center p-5 font-bold uppercase text-gray-400">
      <p>SocialDev - All rights reserved &copy; {{ now()->year }}</p>
      <p></p>
    </footer>
  </body>
</html>
