<!DOCTYPE html>
<html>

<head>
    @include('common.head')
</head>

<body>
    @include('common.header')
    <div class="new">
        <h3>投稿の編集</h3>
        <h4>{{ $ranking->name }}</h4>
        <div class="new-ranking">
            <form action="" method="post">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label"> タイトル</label>
                    <input type="text" name="title" value="{{ $post->title }}" class="form-control" id="formGroupExampleInput">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">投稿URL</label>
                    <input type="text" name="url" value="{{ $post->url }}" class="form-control" id="formGroupExampleInput2">
                </div>
                <div class="edit-btn">
                    <button type="submit" formaction="{{ route('post.edit.post', ['post_id' => $post->id]) }}"  class="btn btn-primary">編集</button>
                    <button type="submit" formaction="{{ route('post.delete', ['post_id' => $post->id]) }}" class="btn btn-danger" onclick="return confirm('本当に削除しますか?')">削除</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
