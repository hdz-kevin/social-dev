@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
  @if ($posts->count() > 0)
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
      @foreach ($posts as $post)
        <div>
          <a href="{{ route('posts.show', ['user' => $post->user->username, 'post' => $post->id]) }}">
            <img src="{{ asset('uploads') . '/' . $post->image }}" alt="post image">
          </a>
        </div>
      @endforeach
    </div>
  @else
    <p class="text-gray-600 uppercase text-medium text-center font-bold">there are no posts you can see, follow someone!</p>
  @endif
@endsection
