<header class="header">
    <div class="header-area">
        <div class="title-area">
            <div class="openbtn6"><span></span><span></span><span></span></div>
            <h1 class="header-title">Rese</h1>
            <div class="main-menu">
                <nav class="main-nav">
                    <ul class="main-nav-lists">
                        @if (Auth::check())
                        <li class="main-nav-list"><a href="/shops">店舗一覧</a></li>
                        <form action="/logout" method="POST" class="logout-form">
                            @csrf
                            <button class="logout-btn">ログアウト</button>
                        </form>
                        <li class="main-nav-list"><a href="/mypage">マイページ</a></li>
                        @else
                        <li class="main-nav-list"><a href="/shops">店舗一覧</a></li>
                        <li class="main-nav-list-notlogin"><a href="/register">新規登録</a></li>
                        <li class="main-nav-list"><a href="/login">ログイン</a></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
