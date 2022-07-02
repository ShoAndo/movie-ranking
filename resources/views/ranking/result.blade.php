<!DOCTYPE html>
<html>

<head>
    @include('common.head')
</head>

<body>
    @include('common.header')
    <div class="mypage-title">
        <h2>{{$ranking->name}}</h2>
        <div class="mypage-button" style="display: flex; justify-content: flex-end;">
            @auth
                @if ($edit)
                    <button type="button" class="btn btn-secondary" style="margin-right: 2vw;"><a
                            href="{{ route('ranking.edit', ['ranking_id' => $ranking_id]) }}"
                            style="text-decoration: none; color: white;">編集する</a></button>
                @endif
                @if ($possible)
                <button type="button" class="btn btn-secondary"><a
                    href="{{ route('post.new', ['ranking_id' => $ranking_id]) }}"
                    style="text-decoration: none; color: white;">投稿する</a></button>
                @endif
            @endauth
        </div>
    </div>
    <div class="ranking">
        <ul class="list-group">
            @if ($posts->isEmpty())
            <p>まだ投稿はありません</p>
            @else
                @foreach ($posts as $key => $post)
                    <li class="list-group-item">
                        <div class="ranking_name">
                            <p>{{ $key + 1}}位 {{ $post->title }}</p>
                        </div>
                        <div class="ranking_outline">
                            <p>投票:{{ $votes[$key] }}</p>
                            <a
                                href="{{ route('post.detail', ['ranking_id' => $post->ranking_id, 'post_id' => $post->id, 'rank' => $key + 1]) }}">詳細</a>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</body>

</html>
