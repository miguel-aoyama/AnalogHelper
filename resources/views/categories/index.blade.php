@extends('layouts.app')

@section('title','board')

@section('content')
  <div class="main">
    <div class="category">
      <a href="{{route('categories.create')}}">新規作成</a>
      <br>
      <ul>
      @foreach($items as $item)
        <li class="category-name"><a href="{{url('categories/'. $item->id)}}">{{$item->title}}</a></li>
      @endforeach
      </ul>
    </div>

    <div id="range">
      <div class="top">
          <p class="user-name">ようこそ！ {{ Auth::user()->name }}</p>
        </div>
    </div>
  </div>
@endsection
