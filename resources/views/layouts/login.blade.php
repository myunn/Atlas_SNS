<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
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
    <link rel="apple-touch-icon-precom
    ed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header class = "head">
            <!-- 記載：画像リンク -->
        <a href="/top"><img src="http://127.0.0.1:8000/images/atlas.png" class="logo"></a>
            <div id="login.A">
                <!-- 記載：アコーディオンメニュー設定 -->
                <div class="accordion">
                    <p class=user_name>{{ Auth::user()->username }}さん</p>
                    <p class="nav-btn"> </p>
                    <ul class="nav-menu">
                        <li><a href="/top">HOME</a></li>
                        <li><a href="/profile">プロフィール編集</a></li>
                        <li><a href="/logout">ログアウト</a></li>
                    </ul>
                    <img src="http://127.0.0.1:8000/images/{{Auth::user()->images}}">
                </div>
            </div>
    </header>
    <!-- 共通ぽいからここ？でもここに入れるとそれぞれのページの必要な情報入力できない？ -->
    <!-- <div id="under-bar"></div> -->

    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div class="sidebar">
            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>
                <div class=login.C>
                <p>フォロー数</p>
                <p>{{Auth::user()->follows()->count()}}名</p>
                </div>
                <div class=login.D>
                <button class="follow-list"><a href="/follow-list">フォローリスト</a></button>
                <div class=login.E>
                <p>フォロワー数</p>
                <p>名</p>
                </div>
                <div class=login.F>
                <button class="follower-list"><a href="/follower-list">フォロワーリスト</a></button>
                <!-- <p class="btn"><a href="/follower-list">フォロワーリスト</a></p> -->
                </div>
                <hr>
                </div>
            <button class="user-search"><a href="/search">ユーザー検索</a></button>
            <!-- <p class="btn"><a href="/search">ユーザー検索</a></p> -->
            </div>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('js/script.js') }} "></script>
</body>
</html>
