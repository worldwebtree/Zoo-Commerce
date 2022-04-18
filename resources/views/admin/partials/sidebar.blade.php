<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Umar KhaN <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('admin') ? 'active' : ''}}">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - User -->
    <li class="nav-item {{ request()->is('users') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('users.index')}}">
            <i class="fas fa-user"></i>
            <span>User Managment</span></a>
    </li>

    <!-- Nav Item - Cateogry -->
    <li class="nav-item {{ request()->is('categories') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('categories.index')}}">
            <i class="fas fa-user"></i>
            <span>Category Management</span></a>
    </li>

     <!-- Nav Item - SubCateogry -->
     <li class="nav-item {{ request()->is('subcategories') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('subcategories.index')}}">
            <i class="fas fa-user"></i>
            <span>SubCategory Management</span></a>
    </li>

       <!-- Nav Item - Brands -->
       <li class="nav-item {{ request()->is('brands') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('brands.index')}}">
            <i class="fas fa-user"></i>
            <span>Brand Managemant</span></a>
    </li>

      <!-- Nav Item - Brands -->
      <li class="nav-item {{ request()->is('products') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('products.index')}}">
           <i class="fa fa-shopping-basket" aria-hidden="true"></i>
            <span>Products</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

   

</ul>