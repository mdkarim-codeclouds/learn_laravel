@section('sidebar')
    <?php $current_route = Route::currentRouteName(); ?>
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">LC Admin</div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?= $current_route == "dashboard" ? "active" : "" ?>">
            <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">Interface</div>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?= in_array($current_route, ['products.index','products.create','products.show','products.edit']) ? "active" : "" ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Products</span>
            </a>
            <div id="collapseTwo" class="collapse <?= in_array($current_route, ['products.index','products.create','products.show','products.edit']) ? "show" : "" ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Product Addons:</h6>
                    <a class="collapse-item <?= in_array($current_route, ['products.index','products.show']) ? "active" : "" ?>" href="{{ route('products.index') }}">List</a>
                    <a class="collapse-item <?= in_array($current_route, ['products.create','products.edit']) ? "active" : "" ?>" href="{{ route('products.create') }}">Add</a>
                </div>
            </div>
        </li>
        <!-- Nav Item - Todo List -->
        <li class="nav-item <?= $current_route == "todo.index" ? "active" : "" ?>">
            <a class="nav-link" href="{{ route('todo.index') }}"><i class="fas fa-fw fa-list"></i><span>Todo List</span></a>
        </li>
        <!-- Nav Item - Users List -->
        <li class="nav-item <?= in_array($current_route, ['users.index','users.create','users.show','users.edit']) ? "active" : "" ?>">
            <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-fw fa-users"></i><span>Users</span></a>
        </li>
        <!-- Nav Item - Roles List -->
        <li class="nav-item <?= in_array($current_route, ['roles.index','roles.create','roles.show','roles.edit']) ? "active" : "" ?>">
            <a class="nav-link" href="{{ route('roles.index') }}"><i class="fas fa-fw fa-list"></i><span>Roles</span></a>
        </li>
        <!-- Nav Item - Customer List -->
        <li class="nav-item <?= in_array($current_route, ['customer.index','customer.create','customer.show','customer.edit']) ? "active" : "" ?>">
            <a class="nav-link" href="{{ route('customer.index') }}"><i class="fas fa-fw fa-users"></i><span>Customers</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->

@endsection