@extends('layouts.app')

{{-- @section('title')
  {{
    $user->username === auth()->user()->username
      ? 'Your Profile'
      : 'Profile: '.$user->username
  }}
@endsection --}}

@section('content')
  <div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
      <div class="w-8/12 sm:w-6/12 md:w-8/12 px-5 mx-auto">
        <img src="{{ asset('img/user.svg') }}" alt="user profile img">
      </div>
      <div class="md:w-8/12 p-5 flex flex-col md:justify-center">
        <p class="text-gray-700 text-2xl font-medium">{{ $user->username }}</p>
        <p class="text-gray-800 text-sm font-bold mb-2 mt-4">
          0
          <span class="font-normal">Followers</span>
        </p>
        <p class="text-gray-800 text-sm font-bold mb-2">
          0
          <span class="font-normal">Following</span>
        </p>
        <p class="text-gray-800 text-sm font-bold mb-2">
          0
          <span class="font-normal">Posts</span>
        </p>
      </div>
    </div>
  </div>
@endsection
