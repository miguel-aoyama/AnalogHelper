@extends('layouts.app')

@section('title', 'カテゴリ作成')

@section('content')
  <form class="" action="{{route('categories.store')}}" method="post">
    @csrf
    @if ($errors->any())
      <ul>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    @endif
    <input type="text" name="title" value="">
    <input type="submit" name="" value="作成">
  </form>

@endsection
