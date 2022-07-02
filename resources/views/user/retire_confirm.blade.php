<!DOCTYPE html>
<html>

<head>
    @include('common.head')
</head>

<body>
    @include('common.header')
    <div class="retire_confirm">
      <h3>本当に退会しますか？</h3>
      <div class="edit-btn">
        <a href="{{ route('user.retire_complete', ['user_id' => '1']) }}"><button type="submit" class="btn btn-danger" >退会する</button></a>  
        <a href="javascript:history.back()"><button type="submit" class="btn btn-primary">戻る</button></a>
    </div>
    </div>
</body>
</html>