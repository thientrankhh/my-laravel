<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="/">ABC<span>.</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="/">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li class="dropdown"><a href="#"><span>Categories</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        @foreach($categories as $category)
                            <li>
                                <a href="{{ route('categories.get-posts', $category->slug) }}">{{$category->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li><a class="nav-link scrollto " href="{{ route('posts.all') }}">Posts</a></li>
                <li><a class="nav-link scrollto" href="#team">Team</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
