<!DOCTYPE html>
<html>
<head>
@include('common.head')
</head>
<body>
  <div class="login-form">
    <h3>ログイン</h3>
    <form action="{{ route('ranking.index') }}" method="post">
    {{csrf_field()}}
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">メールアドレス</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">パスワード</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">次回から自動的にログインする</label>
      </div>
      <button type="submit" class="btn btn-primary">ログイン</button>
    </form>
  </div>
</body>

</html>