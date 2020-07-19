@extends('app')

@section('content')
@include('nav')

<div class="container">
  <br><br>

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
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="{{ url('/') }}">戻る</a>
    <a class="dropdown-item" href="{{ url('posts/edit', ['id' =>$post->id]) }}">編集</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="{{ url('posts/destroy', ['id' =>$post->id])}}" >削除</a>
  </div>
</div>