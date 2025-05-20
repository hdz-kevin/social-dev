@extends('layouts.app')

@section('title')
  {{ $post->title }}
@endsection

@section('content')
  <div class="container mx-auto md:flex">
    <div class="md:w-1/2">
      <img src="{{ asset('uploads/'.$post->image) }}" alt="post image">

      <div class="p-3">
        <p>0 Likes</p>
      </div>

      <div>
        <p class="font-bold">{{ $user->username }}</p>
        <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
        <p class="mt-5">{{ $post->description }}</p>
      </div>
    </div>

    <div class="md:w-1/2 p-5">
      <div class="shadow bg-white p-5 mb-5">
        <p class="text-2xl font-bold text-center mb-4">Comment this Post</p>

        @if (session('message'))
          <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
            {{ session('message') }}
          </div>
        @endif

        @auth
          <form action="{{ route('comments.store', ['user' => $user->username, 'post' => $post->id]) }}" method="POST">
            @csrf

            <div class="mb-5">
              <label for="comment" class="mb-2 block uppercase text-gray-500 font-bold">Comment</label>
              <textarea
                id="comment"
                name="comment"
                placeholder="Your comment"
                class="border border-gray-300 p-3 w-full rounded-lg focus:border-2 focus:border-gray-400 focus:outline-none"
                autofocus
              >{{ old('comment') }}</textarea>

              @error('comment')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
              @enderror
            </div>

            <input
              type="submit"
              value="Comment"
              class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
            />
          </form>
        @endauth

        <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-8">
          @if ($comments->count() > 0)
            @foreach ($comments as $comment)
              <div class="p-5 border-gray-300 border-b">
                <a href="{{ route('profile.show', $comment->user->username) }}" class="text-sm text-gray-700 font-bold mb-1">
                  {{ $comment->user->username }}
                </a>
                <p>{{ $comment->comment }}</p>
                <p class="text-sm text-gray-500">
                  {{ $comment->created_at->diffForHumans() }}
                </p>
              </div>
            @endforeach
          @else
            <p class="p-10 text-center">There is not comments yet</p>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
