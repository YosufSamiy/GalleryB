<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('frontsite.photo')}}">
            <i class="fas fa-film mr-2"></i>
            Catalog-Z
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link nav-link-1  active" href="{{route('frontsite.photo')}}">Photos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-2" href="{{route('frontsite.videos')}}">Videos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-3 " aria-current="page" href="{{route('frontsite.about')}}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-4" href="{{route('frontsite.contact')}}">Contact</a>
                </li>
                @guest()
                <li class="nav-item">
                    <a class="nav-link nav-link-4" href="{{route('dashboard.dashboard.layout.admin')}}">login</a>
                </li>
                @endguest

                @auth()

                    <li class="nav-item">


                        <a class="nav-link nav-link-4" href="{{route('dashboard.dashboard.layout.admin')}}">Dashboard</a>

                    </li>
                    <form  action="{{route('logout')}}" method="post">
                        @csrf

                    <li class="nav-item">
                        <button  class="btn btn-link" type="submit" name="submit" class="nav-link nav-link-4" href="{{route('logout')}}">logout</button>
                    </li>
                    </form>

                @endauth
            </ul>
        </div>
    </div>
</nav>
