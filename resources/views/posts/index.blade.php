@extends('app')

@section('content')
@include('nav')


<div class="container">
  <br><br><br>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" enctype="multipart/form-data" action="{{route('posts.store')}}">
    @csrf
    <div class="card text-center">

      <div class="card-header">
        新規登録
      </div>
      <div class="card-body row">
        <div class="form-group text-center font-weight-bold">

        </div>

        <div class="form-group text-center font-weight-bold">
          <label>氏名</label>
          <p class="badge badge-danger">必須</p>
          <div class="form-row">
            <div class="col">
              <input class="form-control" name="lastname" placeholder="苗字を入力（文字制限：10）">
            </div>
            <div class="col">
              <input class="form-control" name="firstname" placeholder="名前を入力（文字制限：10）">
            </div>
          </div>
        </div>

        <div class="form-group text-center font-weight-bold">
          <label>メールアドレス</label>
          <p class="badge badge-danger">必須</p>
          <div class="col">
            <input class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
        </div>

        <div class="form-group text-center font-weight-bold">
          <label>コメント</label>
          <p class="badge badge-success">任意</p>
          <div class="col">
            <textarea class="form-control" name="text" placeholder=""></textarea>
          </div>
        </div>

        <div class=" text-center ">
          <button type="submit" class="btn btn-info btn-block">送信</button>
        </div>
      </div>
    </div>
  </form>
  <br><hr>

  <table class="table table-bordered table-sm">
    <thead class="thead-dark text-center">
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
            <a class="dropdown-item" href="#">編集</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">削除</a>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <h5>CSVインポート</h5>
  {{ Form::open(['url' => route('posts.importCSV'), 'method' => 'POST', 'class' => '', 'files' => true]) }}
  <div class='form-group'>
    <input type="file" name="file" value="">
  </div>

  <button type="submit">Import</button>

  {{ Form::close() }}
</div>
