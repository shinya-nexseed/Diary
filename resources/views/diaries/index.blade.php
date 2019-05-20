@extends('layout')

@section('title')
Diary 一覧
@endsection

@section('content')
  @foreach($diaries as $diary)
    <div class="m-4 p-4 border border-primary">
      <p>{{ $diary['title'] }}</p>
      <p>{{ $diary['body'] }}</p>
      <p>{{ $diary['created_at'] }}</p>
    </div>
  @endforeach
@endsection