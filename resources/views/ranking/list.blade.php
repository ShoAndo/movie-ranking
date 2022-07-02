<!DOCTYPE html>
<html>

<head>
    @include('common.head')
</head>

<body>
    @include('common.header')
    <div class="ranking">
        <h2>{{ $text }}ランキング</h2>
        <ul class="list-group">
            @if ($rankings->isEmpty())
                <p>まだ{{ $text }}のランキングはありません</p>
            @else
                @foreach ($rankings as $key => $ranking)
                    <a href="{{route('ranking.result', ['ranking_id' => $ranking->id])}}">
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
