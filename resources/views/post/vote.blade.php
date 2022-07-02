<!DOCTYPE html>
<html>

<head>
    @include('common.head')
</head>

<body>
    @include('common.header')
    <div class="mypage-title">
        <h2>ランキング名</h2>
        <div class="vote-btn">
            <a href=""><button type="button" class="btn btn-secondary">編集する</button></a>
            <a href=""><button type="button" class="btn btn-primary">投稿する</button></a>
        </div>
    </div>
    <div class="ranking">
        <div class="ranking-head">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">暫定一位: </span>
                <input type="text" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default" disabled>
                <a href=""><button type="button" class="btn btn-secondary">編集する</button></a>
            </div>
            <div class="ratio ratio-16x9">
                <iframe src="https://www.youtube.com/embed/TbSxQp22NJU" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <a href=""><button type="button" class="btn btn-secondary" id="vote">投票する</button></a>
            <form action="" method="post">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="コメントをする" aria-label="Recipient's username"
                        aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">送信する</button>
                </div>
            </form>
            <a href=""><button type="button" class="btn btn-secondary" id="vote">その他のコメントを見る</button></a>
        </div>
    </div>
    <div class="ranking">
        <div class="ranking-head">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">暫定一位: </span>
                <input type="text" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default" disabled>
                <a href=""><button type="button" class="btn btn-secondary">編集する</button></a>
            </div>
            <div class="ratio ratio-16x9">
                <iframe src="https://www.youtube.com/embed/TbSxQp22NJU" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <a href=""><button type="button" class="btn btn-secondary" id="vote">投票する</button></a>
            <form action="" method="post">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="コメントをする" aria-label="Recipient's username"
                        aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">送信する</button>
                </div>
            </form>
            <a href=""><button type="button" class="btn btn-secondary" id="vote">その他のコメントを見る</button></a>
        </div>
    </div>
    <div class="ranking">
        <div class="ranking-head">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">暫定一位: </span>
                <input type="text" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default" disabled>
                <a href=""><button type="button" class="btn btn-secondary">編集する</button></a>
            </div>
            <div class="ratio ratio-16x9">
                <iframe src="https://www.youtube.com/embed/TbSxQp22NJU" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <a href=""><button type="button" class="btn btn-secondary" id="vote">投票する</button></a>
            <form action="" method="post">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="コメントをする" aria-label="Recipient's username"
                        aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">送信する</button>
                </div>
            </form>
            <a href=""><button type="button" class="btn btn-secondary" id="vote">その他のコメントを見る</button></a>
        </div>
    </div>
</body>

</html>
