<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'testform') }}</title>
</head>

<body>
新規登録

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
  <div class="form-content">
    <label>苗字</label>
    <input class="form-input" name="lastname" placeholder="">
  </div>

  <div class="form-content">
    <label>名前</label>
    <input class="form-input" name="firstname" placeholder="">
  </div>

  <div class="form-content">
    <label>メールアドレス</label>
    <input class="form-input" name="email" placeholder="">
  </div>

  <div class="form-content">
    <label>コメント</label>
    <textarea class="form-input" name="text" placeholder=""></textarea>
  </div>

  <input type="submit" class="btn" value="送信">
  {{ csrf_field() }}
</fprm>

<table class="table">
<thead>
  <tr>
  <th>id</th>
  <th>苗字</th>
  <th>名前</th>
  <th>E-mail</th>
  <th>コメント</th>
<thead>
<tbody>
  @foreach($posts as $post)
  <tr>
  <th>{{$post->id}}</th>
  <td>{{$post->lastname}}</td>
  <td>{{$post->firstname}}</td>
  <td>{{$post->email}}</td>
  <td>{{$post->text}}</td>
  </tr>
  @endforeach
</tbody>
</table>


</body>
</html>
