@extends('layout')

@section('title')
Diary 一覧
@endsection

@section('content')
  <a href="{{ route('diary.create') }}" class="btn btn-primary">新規投稿</a>
  @foreach($diaries as $diary)
    <div class="m-4 p-4 border border-primary">
      <p>{{ $diary['title'] }}</p>
      <p>{{ $diary['body'] }}</p>
      <p>{{ $diary['created_at'] }}</p>
    </div>
  @endforeach
@endsection















