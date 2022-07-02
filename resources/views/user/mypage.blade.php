<!DOCTYPE html>
<html>

<head>
    @include('common.head')
</head>

<body>
    @include('common.header')
    <div class="mypage-title">
        <h2>マイページ</h2>
        <form action="{{route('user.retire_confirm', ['user_id' => $user_id])}}">
            <button type="submit" class="btn btn-secondary">退会する</button>
        </form>
    </div>
    <div class="mypage-main">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">名前</label>
            <input type="text" value="{{ $user->name }}" class="form-control" aria-label="Username" aria-describedby="basic-addon1" disabled>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">メールアドレス</label>
            <input type="email" value="{{ $user->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" disabled>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">パスワード</label>
            <input type="password" value="{{ $user->password}}"  class="form-control" id="exampleInputPassword1" disabled>
        </div>
        <h4>これまでに作成したランキング</h4>
        <ul class="list-group">
            @if ($rankings->isEmpty())
            <p>これまでに作成したランキングはありません</p>
            @else
                @foreach($rankings as $key => $ranking)
                <a href="{{ route('ranking.result', ['ranking_id' => $ranking->id]) }}">
                    <li class="list-group-item">
                        <div class="ranking_name">
                            {{ $ranking->name }}
                        </div>
                        <div class="ranking_outline">
                            <p>投票数: {{ $votes[$key] }}</p>
                            <p>終了日時: {{ date('m/d', strtotime($ranking->limit_date)) }}</p>
                        </div>
                    </li>
                </a>
                @endforeach
            @endif
        </ul>
    </div>
</body>

</html>
