<!DOCTYPE html>
<html>

<head>
  @include('common.head')
</head>

<body>
    @include('common.header')
    <div class="new">
      <h3>ランキング編集</h3>
      <div class="new-ranking">
        <form method="post">
          {{ csrf_field() }}
        <div class="mb-3">
          @error('name')
            <div class="alert alert-danger" role="alert">
              ランキングを正しく入力してください
            </div>
          @enderror
          <label for="formGroupExampleInput" class="form-label"> ランキング名</label>
          <input type="text" name="name" class="form-control" id="formGroupExampleInput" value="{{ $ranking->name }}" >
        </div>
        <div class="mb-3">
          @error('creator')
            <div class="alert alert-danger" role="alert">
              動画投稿者を正しく入力してください
            </div>
          @enderror
          <label for="formGroupExampleInput2" class="form-label">動画投稿者・配信者名</label>
          <input type="text" name="creator" class="form-control" id="formGroupExampleInput2" value="{{ $ranking->creator }}">
        </div>
        <div class="mb-3">
          @error('limit_date')
            <div class="alert alert-danger" role="alert">
              投稿期限を明日以降に設定してください
            </div>
          @enderror
          <label for="formGroupExampleInput2" class="form-label">投稿期限</label>
          <input type="date" name="limit_date" class="form-control" id="formGroupExampleInput2" value="{{ $ranking->limit_date->format('Y-m-d') }}">
        </div>
        <div class="edit-btn">
          <button type="submit" formaction="{{ route('ranking.edit.post') }}" class="btn btn-primary">編集</button>
          <button type="submit" formaction="{{ route('ranking.delete', ['ranking_id' => $ranking->id]) }}" class="btn btn-danger" onclick="return confirm('本当に削除しますか?')">削除</button>
        </div>
        </form>
      </div>
    </div>
</body>
</html>