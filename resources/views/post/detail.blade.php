<!DOCTYPE html>
<html>

<head>
    @include('common.head')
</head>

<body>
    @include('common.header')
    <div class="mypage-title">
        <h2>{{ $ranking->name }}</h2>
        @if ($ranking_edit)
            <div class="vote-btn">
                <a href=""><button type="button" class="btn btn-secondary">編集する</button></a>
            </div>
        @endif
    </div>
    <div class="ranking">
        <div class="ranking-head">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">
                    {{ $rank }}位: </span>
                <input type="text" class="form-control" aria-label="Sizing example input"
                    value="{{ $post->title }}" aria-describedby="inputGroup-sizing-default" disabled>
                @if ($post_edit)
                    <a href="{{ route('post.edit', ['post_id' => $post->id]) }}"><button type="button"
                            class="btn btn-secondary">編集する</button></a>
                @endif
            </div>
            <div class="ratio ratio-16x9">
                <iframe src="{{ $post->url }}" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <form method="POST" name="vote">
                {{ csrf_field() }}
                @auth
                    @if ($post->isVotedBy($user))
                        <button type="button" formaction="{{ route('post.vote', ['post_id' => $post->id]) }}"
                            class="btn btn-secondary voteButton" data-post-id='{{ $post->id }}'
                            data-rank="{{ $rank }}" id="vote">
                            投票する:
                            <span class="votes_count">{{ $vote }}</span>
                        </button>
                    @else
                        <button type="button" formaction="{{ route('post.vote', ['post_id' => $post->id]) }}"
                            class="btn btn-primary voteButton" data-post-id='{{ $post->id }}'
                            data-rank="{{ $rank }}" id="vote">投票する:<span
                                class="votes_count">{{ $vote }}</span></button>
                    @endif
                @else
                    <button type="button" formaction="{{ route('login') }}" class="btn btn-secondary"
                        id="vote">投票する: {{ $vote }}</button>
                @endauth
            </form>
            <form method="post">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <input type="hidden" name="rank" value="{{ $rank }}">
                    @error('content')
                        <div class="alert alert-danger" role="alert">
                            コメントを入力してください
                        </div>
                    @enderror
                    <input type="text" name="content" class="form-control" placeholder="コメントをする"
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    @auth
                        <button class="btn btn-outline-secondary" formmethod="POST"
                            formaction="{{ route('comment.new', ['post_id' => $post->id]) }}" type="submit"
                            id="button-addon2">送信する</button>
                    @else
                        <button class="btn btn-outline-secondary" formmethod="GET" formaction="{{ route('login') }}"
                            type="submit" id="button-addon2">送信する</button>
                    @endauth
                </div>
            </form>
            <ul class="list-group">
                <h5>コメント欄</h5>
                @foreach ($comments as $comment)
                    <li class="list-group-item">
                        {{ $comment->content }}
                        @if ($comment->user_id === $user_id)
                        <form>
                            <input type="hidden" name="rank" value="{{ $rank }}">
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <button class="btn btn-outline-secondary" formmethod="GET" formaction="{{ route('comment.edit', ["comment_id"=> $comment->id]) }}"
                            type="submit" id="button-addon2">編集する</button>
                        </form>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>

</html>
