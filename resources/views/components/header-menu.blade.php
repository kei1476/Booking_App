<header class="header">
    <div class="header-area">
        <div class="title-area">
            <div class="openbtn6"><span></span><span></span><span></span></div>
            <h1 class="header-title">Rese</h1>
            <div class="main-menu">
                <nav class="main-nav">
                    <ul class="main-nav-lists">
                        <li class="main-nav-list"><a href="/shop/books">予約一覧</a></li>
                        <form action="/admin/logout" method="POST" class="logout-form">
                            @csrf
                            <button class="logout-btn">ログアウト</button>
                        </form>
                        <li class="main-nav-list"><a href="/shop/Info/edit/{{ $shopId }}">店舗情報更新</a></li>
                        <li class="main-nav-list" style="margin-top: 22px"><a href="/shop/course/add/{{ $shopId }}">コース追加・編集</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
