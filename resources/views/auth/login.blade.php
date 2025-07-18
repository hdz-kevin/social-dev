@extends('layouts.app')

@section('title', 'Login in SocialDev')

@section('content')
  <div class="md:flex md:justify-center md:items-center md:gap-10">
    <div class="md:w-6/12 p-5">
      <img src="{{ asset('img/login.jpg') }}" alt="login page img">
    </div>

    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
      <form action="{{ route('login') }}" method="POST" novalidate>
        @csrf

        @if (session('message'))
          <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('message') }}</p>
        @endif

        <div class="mb-5">
          <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
          <input
            id="email"
            name="email"
            type="email"
            placeholder="Your email address"
            class="border border-gray-300 p-3 w-full rounded-lg focus:border-2 focus:border-gray-400 focus:outline-none"
            value="{{ old('email') }}"
            autofocus
          />

          @error('email')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-5">
          <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
          <input
            id="password"
            name="password"
            type="password"
            placeholder="Your password"
            class="border border-gray-300 p-3 w-full rounded-lg focus:border-2 focus:border-gray-400 focus:outline-none"
          />

          @error('password')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-5">
          <input type="checkbox" name="remember" id="remember">
          <label for="remember" class="text-gray-500 text-sm">Remember me</label>
        </div>

        <input type="submit" value="Login"
          class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" />
      </form>
    </div>
  </div>
@endsection
