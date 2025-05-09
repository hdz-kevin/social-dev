@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
  <div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
      <div class="md:w-6/12 px-5">
        <img src="{{ asset('img/user.svg') }}" alt="user profile img">
      </div>
      <div class="md:w-6/12 px-5">
        <p class="text-gray-700 text-2xl font-medium">{{ auth()->user()->username }}</p>
      </div>
    </div>
  </div>
@endsection
