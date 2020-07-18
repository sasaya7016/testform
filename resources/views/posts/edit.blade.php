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

    <form method="POST" enctype="multipart/form-data" action="{{route('posts.update')}}">
      @csrf
      <div class="card text-center">
        <div class="card-header">
          新規登録
        </div>
        <div class="card-body">

          <div class="form-group text-center font-weight-bold">
            <label>氏名</label>
            <p class="badge badge-danger">必須</p>
            <div class="form-row">
              <div class="col">
                <input class="form-control" name="lastname" value="{{ $post->lastname }}" placeholder="苗字">
              </div>
              <div class="col">
                <input class="form-control" name="firstname" value="{{ $post->firstname }}"  placeholder="名前">
              </div>
            </div>
          </div>

          <div class="form-group text-center font-weight-bold">
            <label>メールアドレス</label>
            <p class="badge badge-danger">必須</p>
            <div class="col">
              <input class="form-control" name="email" value="{{ $post->email }}" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
          </div>

          <div class="form-group text-center font-weight-bold">
            <label>コメント</label>
            <p class="badge badge-success">任意</p>
            <div class="col">
              <textarea class="form-control" name="text" value="{{ $post->text }}" placeholder=""></textarea>
            </div>
          </div>

          <div class="col text-center ">
            <button type="submit" class="btn btn-info btn-lg btn-block">送信</button>
          </div>
        </div>
      </div>
    </form>
    <br><hr><br>

   
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


  </body>
</html>
