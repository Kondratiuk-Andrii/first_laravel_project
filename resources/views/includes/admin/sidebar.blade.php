<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-header">Admin Panel</li>
        <li class="nav-item">
            <a href="{{ route('admin.post.index') }}" class="nav-link">
                <i class="nav-icon fas fa-align-justify"></i>
                <p>
                    Posts
                    <span class="badge badge-info right">
                        @if(request()->routeIs('admin.post.index'))
                            {{ $posts->total() }}
                        @else
                            {{ $posts->count() }}
                        @endif
                    </span>
                </p>
            </a>
        </li>
    </ul>
</nav>
