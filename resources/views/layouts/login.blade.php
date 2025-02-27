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
    <header>
        <div id = "head">
            <!-- 記載：画像リンク -->
        <h1><a href="/top"><img src="http://127.0.0.1:8000/images/atlas.png"></a></h1>
            <div id="">
                <div id="">
                    <p class=user_name>{{ $user->username }}さん<img src="http://127.0.0.1:8000/images/{{$user->images}}"></p>
                <div>
                    <!-- 記載：アコーディオンメニュー設定 -->
                    <div class="accordion">
                        <p class="nav-btn"> </p>
                        <ul class="nav-menu">
                            <li><a href="/top">HOME</a></li>
                            <li><a href="/profile">プロフィール編集</a></li>
                            <li><a href="/logout">ログアウト</a></li>
                        </ul>
                    </div>
                </div>
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
                <p>〇〇さんの</p>
                <div>
                <p>フォロー数</p>
                <p>〇〇名</p>
                </div>
                <div>
                <button class="follow-list"><a href="/search">フォローリスト</a></button>
                <div>
                <p>フォロワー数</p>
                <p>〇〇名</p>
                </div>
                <div>
                <button class="follower-list"><a href="/search">フォロワーリスト</a></button>
                <!-- <p class="btn"><a href="/follower-list">フォロワーリスト</a></p> -->
            </div>
              <!-- <div class="under-bar2">
              </div> -->
            <div>
            <button class="user-search"><a href="/search">ユーザー検索</a></button>
            <!-- <p class="btn"><a href="/search">ユーザー検索</a></p> -->
            </div>
        </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('js/script.js') }} "></script>
</body>
</html>
