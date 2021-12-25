@extends('layouts.app')

@section('title', 'カテゴリ作成')

@section('content')
  <form class="" action="{{route('categories.store')}}" method="post">
    @csrf
    @include('components.form-error')
    <input type="text" name="title" value="">
    <input type="submit" name="" class="create" value="Add">
  </form>

@endsection
