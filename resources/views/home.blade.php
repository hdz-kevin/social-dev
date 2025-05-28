@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
  {{-- no slots support --}}
  <x-list-posts :$posts />

  {{-- slots support --}}
  {{-- <x-list-posts> --}}
  {{-- </x-list-posts> --}}
@endsection
