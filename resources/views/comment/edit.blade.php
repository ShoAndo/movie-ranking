<!DOCTYPE html>
<html>

<head>
    @include('common.head')
</head>

<body>
    @include('common.header')
    <div class="new">
        <h3>コメント編集</h3>
        <div class="new-ranking">
            <form action="" method="post">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label"> コメント</label>
                    <input type="text" name="content" value="{{ $comment->content }}" class="form-control" id="formGroupExampleInput">
                </div>
                <div class="edit-btn">
                    <input type="hidden" name="rank" value="{{ $rank }}">
                    <button type="submit" formaction="{{ route('comment.edit.post', ['comment_id' => $comment->id]) }}" class="btn btn-primary">編集</button>
                    <button type="submit" formaction="{{ route('comment.delete', ['comment_id' => $comment->id]) }}"  class="btn btn-danger" onclick="return confirm('本当に削除しますか?')">削除</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
