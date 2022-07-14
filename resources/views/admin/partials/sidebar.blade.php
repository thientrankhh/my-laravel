<div class="sidebar" data-image="{{ asset('admin/dashboard/img/sidebar-5.jpg')}}">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text">
                Admin
            </a>
        </div>
        <ul class="nav">
            <li>
                <a class="nav-link" href="{{ route('admin.categories.index') }}">
                    <i class="nc-icon nc-notes"></i>
                    <p>Categories</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('admin.posts.index') }}">
                    <i class="nc-icon nc-app"></i>
                    <p>Posts</p>
                </a>
            </li>
        </ul>
    </div>
</div>
