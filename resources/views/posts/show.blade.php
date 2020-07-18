@extends('app')

@section('content')
@include('nav')

<div class="container">
  <h4 class="text-center font-weight-bold">フォーム</h4>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="GET" action="">
    @csrf
    <div class="card">
      <div class="card-header text-center">
        詳細
      </div>
      <ul class="list-group ">
        <li class="list-group-item">ID : {{$post->id}}</li>
        <li class="list-group-item">苗字 : {{$post->lastname}}</li>
        <li class="list-group-item">氏名 : {{$post->firstname}}</li>
        <li class="list-group-item">メールアドレス : {{$post->email}}</li>
        <li class="list-group-item">コメント : {{$post->text}}</li>
      </ul>
    </div>
  </form>
  <a href="{{ url('posts/index') }}">戻る</a>

  
</div>