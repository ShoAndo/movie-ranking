<!DOCTYPE html>
<html>

<head>
    @include('common.head')
</head>

<body>
    <div class="login-form">
        <h3>新規登録</h3>
        <form action="{{ route('user.login') }}">
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">名前</label>
                <input type="text" class="form-control" placeholder="山田太郎" aria-label="Username"
                    aria-describedby="basic-addon1">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">メールアドレス</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">パスワード</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">新規登録</button>
        </form>
    </div>
</body>

</html>
