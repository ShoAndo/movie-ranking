<!DOCTYPE html>
<html>

<head>
    @include('common.head')
</head>

<body>
    @include('common.header')
    <div class="retire_complete">
      <h3>ご利用ありがとうございました</h3>
      <a href="{{ route('ranking.index') }}"><button type="submit" class="btn btn-primary" >トップに戻る</button></a>  
    </div>
    </div>
</body>
</html>