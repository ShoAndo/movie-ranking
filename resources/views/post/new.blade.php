<!DOCTYPE html>
<html>

<head>
  @include('common.head')
</head>

<body>
    @include('common.header')
    <div class="new">
      <h3>新規投稿</h3>
      <h4>ランキング1</h4>
      <div class="new-ranking">
        <form action="" method="post">
          {{ csrf_field() }}
        <div class="mb-3">
          @error('title')
            <div class="alert alert-danger" role="alert">
              タイトルを正しく入力してください
            </div>
          @enderror
          <label for="formGroupExampleInput" class="form-label"> タイトル</label>
          <input type="text" name="title" class="form-control" id="formGroupExampleInput" value="{{ old('title') }}" >
        </div>
        <div class="mb-3">
          @error('url')
            <div class="alert alert-danger" role="alert">
              URLを正しく入力してください
            </div>
          @enderror
          <label for="formGroupExampleInput2" class="form-label">投稿URL</label>
          <input type="text" name="url" class="form-control" id="formGroupExampleInput2" value="{{ old('url') }}">
        </div>
        <button type="submit" class="btn btn-primary">投稿</button>
        </form>
      </div>
    </div>
</body>
</html>