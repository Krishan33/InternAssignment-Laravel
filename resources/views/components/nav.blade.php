<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('product') }}">Products</a>
          </li>
        </ul>
        @if (Auth::user())
            <form class="d-flex" method="POST" action="{{ route('logout') }}" x-data>
            @csrf
            <x-jet-dropdown-link href="{{ route('logout') }}"
                     @click.prevent="$root.submit();">
                <button class="btn btn-outline-success" type="submit">Log Out</button>
            </x-jet-dropdown-link>
            </button>
      </div>
        </form>
        @else
        <span><a href="{{ route('login') }}"><button class="btn btn-outline-success" style="margin-right: 10px" type="submit">Log Out</button></a></span>
        <span><a href="{{ route('register') }}"><button class="btn btn-outline-success" type="submit">Register</button></a></span>
        @endif
      </div>
    </div>
  </nav>
