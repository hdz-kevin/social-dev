@extends('layouts.app')

@section('title', 'Register on SocialDev')

@section('content')
  <div class="md:flex md:justify-center md:gap-8 md:items-center">
    <div class="md:w-6/12 xl:w-5/12">
      <img src="{{ asset('img/register.jpg') }}" alt="Create account" />
    </div>

    <div class="md:w-6/12 xl:w-4/12 p-5 rounded-lg shadow">
      <form action="#">
        <div class="mb-5">
          <label for="name" class="text-gray-200 font-bold">Name</label>
          <input type="text" id="name" name="name" placeholder="Your Name"
            class="w-full mt-2 p-3 bg-gray-700 rounded-lg" />
        </div>

        <div class="mb-5">
          <label for="username" class="text-gray-200 font-bold">Username</label>
          <input id="username" name="username" type="text" placeholder="Your username"
            class="w-full mt-2 p-3 bg-gray-700 rounded-lg">
        </div>

        <div class="mb-5">
          <label for="email" class="text-gray-200 font-bold">Email</label>
          <input id="email" name="email" type="text" placeholder="Your email address"
            class="w-full mt-2 p-3 bg-gray-700 rounded-lg">
        </div>

        <div class="mb-5">
          <label for="password" class="text-gray-200 font-bold">Password</label>
          <input id="password" name="password" type="password" placeholder="Your password"
            class="w-full mt-2 p-3 bg-gray-700 rounded-lg">
        </div>

        <div class="mb-5">
          <label for="password_confirmation" class="text-gray-200 font-bold">Confirm Password</label>
          <input id="password_confirmation" name="password_confirmation" type="password"
            placeholder="Confirm your password" class="w-full mt-2 p-3 bg-gray-700 rounded-lg">
        </div>

        <input type="submit" value="Create account"
          class="bg-[#FF4D00] hover:bg-[#FF4D00]/80 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" />
      </form>
    </div>
  @endsection
