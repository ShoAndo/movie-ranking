<header>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('ranking.index') }}">おもしろ動画ランキング</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if (Route::has('login'))
                            @auth 
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('user.mypage', ['user_id' => $user_id] ) }}" aria-current="page">マイページ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page"
                                        href="{{ route('ranking.new') }}">ランキング作成</a>
                                </li>
                                <li class="nav-item" name="logout">
                                    <form method="POST" action="{{ route('logout') }}" name="logout">
                                        {{ csrf_field() }}
                                        <a class="nav-link active" aria-current="page" href="" onclick="document.logout.submit(); return false;">ログアウト</a>
                                    </form>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('login') }}">ログイン</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page"href="{{ route('register') }}">新規登録</a>
                                    </li>
                                @endif
                            @endif
                        </div>
                    @endif
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            </div>
        </nav>
    </header>
