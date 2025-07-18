@extends('layouts.app')

@section('content')
  <div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
      <div class="w-8/12 sm:w-6/12 md:w-8/12 px-5 mx-auto">
        <img src="{{ $user->image ? asset('profiles/'.$user->image) : asset('img/user.svg') }}" alt="user profile img"
          class="rounded-full object-cover mx-auto" />
      </div>
      <div class="md:w-8/12 p-5 flex flex-col md:justify-center">
        <div class="flex items-center gap-2">
          <p class="text-gray-700 text-2xl font-medium">{{ $user->username }}</p>

          @if ($user->id === auth()->id())
            <a href="{{ route('profile.edit', $user->username) }}" class="text-gray-500 hover:text-gray-600 cursor-pointer">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
              </svg>
            </a>
          @endif
        </div>
        <p class="text-gray-800 text-sm font-bold mb-2 mt-4">
          @php
            $followersCount = $user->followers->count();
          @endphp
          {{ $followersCount }}
          <span class="font-normal">@choice('Follower|Followers', $followersCount)</span>
        </p>
        <p class="text-gray-800 text-sm font-bold mb-2">
          {{ $user->following->count() }}
          <span class="font-normal">Following</span>
        </p>
        <p class="text-gray-800 text-sm font-bold mb-2">
          {{ $posts->count() }}
          <span class="font-normal">Posts</span>
        </p>
        {{-- follow/unfollow button --}}
        @if (auth()->user()?->id !== $user->id)
          {{-- Si no esta autenticado o sigue a $user: follow --}}
          @if (! auth()->user()?->isFollowing($user))
            <form action="{{ route('users.follows', $user->username) }}" method="POST">
              @csrf
              <input type="submit" value="Follow"
                class="bg-blue-600 hover:bg-blue-700 text-white uppercase rounded-lg px-4 py-2 text-xs font-bold cursor-pointer">
            </form>
          {{-- Si esta autenticado y sigue a $user: unfollow --}}
          @else
            <form action="{{ route('users.follows', $user->username) }}" method="POST">
              @csrf
              <input type="submit" value="Unfollow"
                class="bg-red-600 hover:bg-red-700 text-white uppercase rounded-lg px-4 py-2 text-xs font-bold cursor-pointer">
            </form>
          @endif
        @endif
      </div>
    </div>
  </div>

  <section class="container mx-auto mt-10">
    <h2 class="text-4xl text-center font-black my-10">Posts</h2>

    <x-list-posts :$posts :paginate="true" />
  </section>
@endsection
