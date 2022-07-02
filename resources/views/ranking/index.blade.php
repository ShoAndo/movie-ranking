<!DOCTYPE html>
<html>

<head>
    @include('common.head')
</head>

<body>
    @include('common.header')
    <div class="ranking">
        <h2>最近のランキング</h2>
        <ul class="list-group">
            @if ($past_rankings->isEmpty())
            <p>最近のランキングはありません</p>
            @else
                @foreach ($past_rankings as $key => $past_ranking)
                    <a href="{{ route('ranking.result', ['ranking_id' => $past_ranking->id]) }}">
                        <li class="list-group-item">
                            <div class="ranking_name">
                                {{ $past_ranking->name }}
                            </div>
                            <div class="ranking_outline">
                                <p>投票数: {{ $past_rankings_votes[$key] }}</p>
                                <p>終了日時: {{ date('m/d', strtotime($past_ranking->limit_date)) }}</p>
                            </div>
                        </li>
                    </a>
                @endforeach
            @endif
        </ul>
        <p class="more">
            <a href="{{ route('ranking.list', ['time' => 'past']) }}">もっと見る</a>
        </p>
    </div>
    <div class="ranking">
        <h2>現在投票中のランキング</h2>
        <ul class="list-group">
            @if ($now_rankings->isEmpty())
            <p>現在投票中のランキングはありません</p>
            @else
                @foreach ($now_rankings as $key => $now_ranking)
                    <a href="{{ route('ranking.result', ['ranking_id' => $now_ranking->id]) }}">
                        <li class="list-group-item">
                            <div class="ranking_name">
                                {{ $now_ranking->name }}
                            </div>
                            <div class="ranking_outline">
                                <p>投票数: {{ $now_rankings_votes[$key] }}</p>
                                <p>終了日時: {{ date('m/d', strtotime($now_ranking->limit_date)) }}</p>
                            </div>
                        </li>
                    </a>
                @endforeach
            @endif
        </ul>
        <p class="more">
            <a href="{{ route('ranking.list', ['time' => 'now']) }}">もっと見る</a>
        </p>
    </div>

</body>


</html>
