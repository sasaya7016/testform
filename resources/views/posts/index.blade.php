<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'testform') }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>

  <body>
  <div class="container">
    <h4 class="text-center font-weight-bold">新規登録</h4>
    <br>

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
      <div class="form-group text-center font-weight-bold">
        <label>苗字</label>
        <p class="badge badge-danger">必須</p>
        <div class="col-sm-12">
          <input class="form-control" name="lastname" placeholder="苗字">
        </div>
      </div>
      <div class="form-group text-center font-weight-bold">
        <label>名前</label>
        <p class="badge badge-danger">必須</p>
        <div class="col-sm-12">
          <input class="form-control" name="firstname" placeholder="名前">
        </div>
      </div>

      <div class="form-group text-center font-weight-bold">
        <label>メールアドレス</label>
        <p class="badge badge-danger">必須</p>
        <div class="col-sm-12">
          <input class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
      </div>

      <div class="form-group text-center font-weight-bold">
        <label>コメント</label>
        <p class="badge badge-success">任意</p>
        <div class="col-sm-12">
          <textarea class="form-control" name="text" placeholder=""></textarea>
        </div>
      </div>

      <div class="col-sm-12 text-center ">
        <button type="submit" class="btn btn-info">送信</button>
      </div>
    </form>
    <br>

    <h4>表示
      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        CSV
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Inport（作成中）</a>
        <a class="dropdown-item" href="#">Export（作成中）</a>
      </div>
    </h4>

    <table class="table table-bordered table-sm">
      <thead class="thead-dark">
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
          <th scope="row">{{$post->id}}</th>
          <td class="row-2 text-truncate">{{$post->lastname}}</td>
          <td class="row-2 text-truncate">{{$post->firstname}}</td>
          <td class="row-3 text-truncate">{{$post->email}}</td>
          <td class="row-3 text-truncate">{{$post->text}}</td>
          <td class="row-2 text-truncate">
            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Action
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">詳細</a>
              <a class="dropdown-item" href="#">編集</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">削除</a>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


  </body>
</html>
