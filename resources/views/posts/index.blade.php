@extends('app')

@section('content')
@include('nav')


<div class="container">
  <br><br>
  @include('error')

  <div class="row" style="margin:0 auto">
    <div class="card text-center" style="width: 70%;">
      <div class="card-header">
        新規登録
      </div>
      <div class="card-body">
        <form method="POST" enctype="multipart/form-data" action="{{route('posts.store')}}">
          @csrf
          <div class="form-row">
            <div class="col">
              <label>苗字</label>
              <p class="badge badge-danger">必須</p>
              <input name="lastname" class="form-control" placeholder="Lastname max:10">
            </div>
            <div class="col">
              <label>名前</label>
              <p class="badge badge-danger">必須</p>
              <input name="firstname" class="form-control" placeholder="Firstname max:10">
            </div>
            <div class="col-6">
              <label>メールアドレス</label>
              <p class="badge badge-danger">必須</p>
              <input name="email" class="form-control" placeholder="E-mail max:50" >
            </div>
          </div><br>

          <div class="form-row">
            <div class="col">
              <label>コメント</label>
              <p class="badge badge-success">任意</p>
              <textarea class="form-control" name="text" placeholder="Text max:100"></textarea>
            </div>
          </div><br>

          <div class="form-row">
            <div class="col">
              <button type="submit" class="btn btn-info btn-block">送信</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="card text-center" style="width: 30%;">
      <div class="card-header">
        CSV
      </div>
      <div class="card-body">
        <h5>CSV インポート</h5>
        ↓Importする前にFile入れて下さい
        {{ Form::open(['url' => route('posts.import'), 'method' => 'POST', 'class' => '', 'files' => true]) }}
        <div class='form-group'>
          <input type="file" name="file" value="">
        </div>
        <button type="submit" class="btn btn-success btn-block">Import</button>
        {{ Form::close() }}

        <hr>

        <h5>CSV エクスポート</h5>
        <br>
        {{ Form::open(['url' => route('posts.export'), 'method' => 'POST', 'class' => '', 'files' => true]) }}
        <button type="submit" class="btn btn-primary btn-block">Export</button>
        {{ Form::close() }}
      </div>
    </div>
  </div>

  <br>

  <table class="table table-bordered table-sm">
    <thead class="thead-dark text-center">
      <h5>表示</h5>
      <tr>
        <th scope="col">id</th>
        <th scope="col">苗字</th>
        <th scope="col">名前</th>
        <th scope="col">E-mail</th>
        <th scope="col">コメント</th>
        <th scope="col">操作</th>
    <thead>
    <tbody>
      @foreach($posts as $post)
      <tr>
        <th class="text-center">{{$post->id}}</th>
        <td class="row-2 text-truncate">{{$post->lastname}}</td>
        <td class="row-2 text-truncate">{{$post->firstname}}</td>
        <td class="row-3 text-truncate">{{$post->email}}</td>
        <td class="row-3 text-truncate">{{$post->text}}</td>
        <td class="row-2 text-truncate text-center">
          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Action
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ url('posts/show', ['id' =>$post->id]) }}">詳細</a>
            <a class="dropdown-item" href="{{ url('posts/edit', ['id' =>$post->id]) }}">編集</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ url('posts/destroy', ['id' =>$post->id])}}" >削除</a>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>