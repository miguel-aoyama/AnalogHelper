@extends('layouts.app')

@section('title', 'カテゴリ作成')

@section('content')
  <form class="" action="{{route('categories.update', ['category' => $category])}}" method="post">
    @method('PUT')
    @csrf
    @include('components.form-error')
    <input type="hidden" name="_method" value="PUT">
    <input type="text" name="title" value="{{$category->title}}">
    <input type="hidden" name="user_id" value="{{$category->user_id}}">
    <input type="submit" name="" class="update-btn" value="Edit">
  </form>

@endsection
