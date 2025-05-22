@extends('layouts.app')

@section('title', 'Edit Profile: '.$user->username)

@section('content')
  <div class="md:flex md:justify-center">
    <div class="md:w-2/5 bg-white shadow p-6">
      <form action="#" class="mt-10 md:mt-0">
        @csrf

        <div class="mb-5">
          <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
          <input
            id="username"
            name="username"
            type="text"
            placeholder="Your username"
            value="{{ old('username') ?? $user->username }}"
            class="border border-gray-300 p-3 w-full rounded-lg focus:border-2 focus:border-gray-400 focus:outline-none"
          />

          @error('username')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-5">
          <label for="image" class="mb-2 block uppercase text-gray-500 font-bold">Profile Image</label>
          <input
            id="image"
            name="image"
            type="file"
            class="border p-3 w-full rounded-lg cursor-pointer bg-gray-50 border-gray-300 focus:border-gray-400 focus:outline-none"
            {{-- value="{{ old('image') }}" --}}
            accept="image/jpeg, image/png, image/jpg"
          />
        </div>

        <input type="submit" value="Save Changes"
          class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" />
      </form>
    </div>
  </div>
@endsection
