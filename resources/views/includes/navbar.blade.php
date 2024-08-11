<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" style="margin-left: 5px" href="{{ route('books.index') }}">Accueil</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('books.index') }}">Books</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      @if (Auth::user())
        <li class="nav-item active" hidden>
          <a class="nav-link" href="{{ route('books.index') }}">Espace Admin</a>
        </li>
        <li class="nav-item">
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn">Se déconnecter</button>
          </form>
        </li>
      @else
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('login') }}">Me connecter</a>
        </li>
      @endif
    </ul>
  </div>
</nav>