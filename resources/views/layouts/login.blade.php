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
        <div id = "head">
        <h1 class="title"><a href="/top"><img src="images/atlas.png"></a></h1>
            <div id="">
                <div id="">
                    <p>{{ Auth::user()->username }}さん<img src="{{ asset('storage/images/' . Auth::user()->images) }}" class= "photo-size"></p>
                <div>
                    <div class="pulldown">
                    <!-- <span class="left"></span>
                    <span class="right"></span> -->
                    </div>
                <ul class="pulldown-box">
                    <li class=pulldown-menu><a href="/top">ホーム</a></li>
                    <li class=pulldown-menu><a href="/users/profile">プロフィール</a></li>
                    <li class=pulldown-menu><a href="/logout">ログアウト</a></li>
                </ul>
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
                <div>
                <p>フォロー数</p>
                <p>{{ Auth::user()->follows->count() }}名</p>
                </div>
                <button class="btn"><a href="/follows/followList">フォローリスト</a></button>
                <div>
                <p>フォロワー数</p>
                <p> {{ Auth::user()->followers->count() }}名</p>
                </div>
                <button class="btn"><a href="/follows/followerList">フォロワーリスト</a></button>
            </div>
            <button class="btn"><a href="/users/search">ユーザー検索</a></button>
        </div>
    </div>
    <footer>
    </footer>
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
