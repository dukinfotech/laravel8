<nav class="navbar navbar-danger bg-danger">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Home</a>
    @guest
    <div>
      <a href="/login">Login</a> /
      <a href="/register">Register</a>
    </div>
    @endguest

    @auth
    <div class="dropdown">
      <button class="btn btn-outline-none dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        Hi, {{ auth()->user()->name }}
      </button>
      <ul class="dropdown-menu">
        <li>
          <form action="/logout" method="post">
            @csrf
            <button class="btn btn-transparent w-100">Logout</button>
          </form>
        </li>
      </ul>
    </div>
    @endauth
  </div>
</nav>