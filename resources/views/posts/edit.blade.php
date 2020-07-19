@extends('app')

@section('content')
@include('nav')

<div class="container">
  <br><br>
  @include('error')

  <div class="row" style="margin:0 auto">
    <div class="card text-center" style="width: 70%;">
      <div class="card-header">
        編集画面
      </div>
      <div class="card-body">
        <form method="POST" enctype="multipart/form-data" action="{{route('posts.store')}}">
          @csrf
          <div class="form-row">
            <div class="col">
              <label>苗字</label>
              <p class="badge badge-danger">必須</p>
              <input name="lastname" class="form-control" placeholder="Lastname max:10" value="{{$post->lastname}}">
            </div>
            <div class="col">
              <label>名前</label>
              <p class="badge badge-danger">必須</p>
              <input name="firstname" class="form-control" placeholder="Firstname max:10" value="{{$post->firstname}}">
            </div>
            <div class="col-6">
              <label>メールアドレス</label>
              <p class="badge badge-danger">必須</p>
              <input name="email" class="form-control" placeholder="E-mail max:50" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$post->email}}">
            </div>
          </div><br>

          <div class="form-row">
            <div class="col">
              <label>コメント</label>
              <p class="badge badge-success">任意</p>
              <textarea class="form-control" name="text" placeholder="Text max:100" value="{{$post->text}}"></textarea>
            </div>
          </div><br>

          <div class="form-row">
            <div class="col">
              <button type="submit" class="btn btn-info btn-block">更新</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="card text-center" style="width: 30%;">
      <div class="card-header">
        説明
      </div>
      <div class="card-body">
        <br><hr>
        メールアドレスは、一度別のアドレスに変更して下さい。
        <hr>
        左記内容編集したら、更新ボタン押して下さい
        <hr>
        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Action
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ url('/') }}">戻る</a>
          <a class="dropdown-item" href="{{ url('posts/show', ['id' =>$post->id]) }}">詳細</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ url('posts/destroy', ['id' =>$post->id])}}" >削除</a>
        </div>
    </div>
  </div>
</div>

  
 