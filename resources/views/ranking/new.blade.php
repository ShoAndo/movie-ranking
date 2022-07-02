<!DOCTYPE html>
<html>

<head>
  @include('common.head')
</head>

<body>
    @include('common.header')
    <div class="new">
      <h3>新規ランキング作成</h3>
      <div class="new-ranking">
        <form action="" method="post">
          {{ csrf_field() }}
        <div class="mb-3">
          @error('name')
            <div class="alert alert-danger" role="alert">
              ランキングを正しく入力してください
            </div>
          @enderror
          <label for="formGroupExampleInput" class="form-label"> ランキング名</label>
          <input type="text" name="name" class="form-control" id="formGroupExampleInput" value="{{ old('name') }}" >
        </div>
        <div class="mb-3">
          @error('creator')
            <div class="alert alert-danger" role="alert">
              動画投稿者を正しく入力してください
            </div>
          @enderror
          <label for="formGroupExampleInput2" class="form-label">動画投稿者・配信者名</label>
          <input type="text" name="creator" class="form-control" id="formGroupExampleInput2" value="{{ old('creator') }}">
        </div>
        <div class="mb-3">
          @error('limit_date')
            <div class="alert alert-danger" role="alert">
              投稿期限を明日以降に設定してください
            </div>
          @enderror
          <label for="formGroupExampleInput2" class="form-label">投稿期限</label>
          <input type="date" name="limit_date" class="form-control" id="formGroupExampleInput2" value="{{ old('limit_date') }}">
        </div>
        <button type="submit" class="btn btn-primary">作成</button>
        </form>
      </div>
    </div>
</body>
</html>