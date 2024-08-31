<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="topページ" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div class="header-wrapper">
           <h1 class="title"><a href="/top"><img src="{{ asset('images/atlas.png') }}" class="title-logo">
           </a></h1>
        <div class="header-content">
          <div class="login-user">
            <p class="login-username">{{ Auth::user()->username }}さん</p>
            <a href="/top" class="login-photo"><img src="{{ asset('storage/images/' . Auth::user()->images) }}" class= "photo-size"></a>
          </div>

            <div class="pulldown-content">
                <div class="pulldown"></div>
                <ul class="pulldown-box">
                    <li class=pulldown-menu><a href="/top">ホーム</a></li>
                    <li class=pulldown-menu><a href="/users/profile">プロフィール</a></li>
                    <li class=pulldown-menu><a href="/logout">ログアウト</a></li>
                </ul>
            </div>
        </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>

                <div class="side-count">
                <p>フォロー数</p>
                <p>{{ Auth::user()->follows->count() }}名</p>
                </div>
                <a href="/follows/followList" class="side-btn">フォローリスト</a>

                <div class="side-count">
                <p>フォロワー数</p>
                <p> {{ Auth::user()->followers->count() }}名</p>
                </div>

                <a href="/follows/followerList" class="side-btn">フォロワーリスト</a>
            </div>
            <a href="/users/search" class="side-btn center-btn">ユーザー検索</a>
        </div>
    </div>
    <footer>
    </footer>
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
