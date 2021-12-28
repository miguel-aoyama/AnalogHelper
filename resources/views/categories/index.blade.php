@extends('layouts.app')

@section('title','board')

@section('content')
<div class="main">
@include('components.sidebar', ['items' => $items])
    <div id="range">
      <div class="top">
          <p class="user-name">ようこそ！ {{ Auth::user()->name }}</p>
        </div>
    </div>
  </div>
@endsection
