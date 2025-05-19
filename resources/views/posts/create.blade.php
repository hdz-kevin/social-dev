@extends('layouts.app')

@push('styles')
  <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@push('scripts')
  @vite('resources/js/create-post.js')
@endpush

@section('title', 'Share a new Post')

@section('content')
  <div class="md:flex md:items-center">
    <div class="md:w-1/2 px-10">
      <form id="dropzone" action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data"
        class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
        @csrf

      </form>
    </div>
    <div class="md:w-1/2 mt-10 md:mt-0 p-6 rounded-lg shadow-xl">
      <form action="{{ route('posts.store') }}" method="POST" novalidate>
        @csrf

        <div class="mb-5">
          <label for="title" class="mb-2 block uppercase text-gray-500 font-bold">Title</label>
          <input
            id="title"
            name="title"
            type="text"
            placeholder="Post title"
            value="{{ old('title') }}"
            class="border border-gray-300 p-3 w-full rounded-lg focus:border-2 focus:border-gray-400 focus:outline-none"
            autofocus
          />

          @error('title')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-5">
          <label for="description" class="mb-2 block uppercase text-gray-500 font-bold">Description</label>
          <textarea
            id="description"
            name="description"
            placeholder="Post description"
            class="border border-gray-300 p-3 w-full rounded-lg focus:border-2 focus:border-gray-400 focus:outline-none"
          >{{ old('description') }}</textarea>

          @error('description')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-5">
          <input
            type="hidden"
            name="image"
            value="{{ old('image') }}"
          >

          @error('image')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
          @enderror
        </div>

        <input type="submit" value="Post"
          class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" />
      </form>
    </div>
  </div>
@endsection
