{{--タブメニュー--}}
<div class="container py-1 mb-2">
  <nav class="nav d-flex border-bottom border-secondary">
    {{--今いるURLが一致すれば背景を暗くする--}}
    @php ($home = Request::is('/') ? 'bg-dark' : '')
    @php ($category = Request::is('category') ? 'bg-dark' : '')
    <a class="text-light rounded-top mr-1 p-2 text-decoration-none bg-secondary {{$home}}" href="/">ホーム</a>
    <a class="text-light rounded-top mr-1 p-2 text-decoration-none bg-secondary {{$category}}"
      href="/category">カテゴリ一覧</a>
    <a class="text-light rounded-top mr-1 p-2 text-decoration-none bg-secondary " href="/example">Exampleページ</a>
    <a class="text-light rounded-top mr-1 p-2 text-decoration-none bg-secondary "
      href="/room/favoriterooms">お気に入りの部屋</a>
    <a class="text-light rounded-top mr-1 p-2 text-decoration-none bg-secondary " href="/room/joinedrooms">参加した部屋</a>
  </nav>
</div>