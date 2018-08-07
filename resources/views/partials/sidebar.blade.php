<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <img src=" {{ asset('img/sprts.png') }}" width="40px" height="40px">
            <h3>Organic's</h3>
        </div>

        <ul class="list-unstyled components">
            <li>
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Category</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="{{ route('category.create') }}">Create Category</a>
                    </li>
                    <li>
                        <a href="{{ route('category.index') }}">Category List</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Product</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="{{ route('product.create') }}">Create Product</a>
                    </li>
                    <li>
                        <a href="{{ route('product.index') }}">Product List</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('order.index') }}">Order</a>
            </li>
        </ul>
    </nav>

    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <button type="button" id="sidebarCollapse" class="btn btn-secondary" >
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
            
        </nav>

        @yield('content')
    </div>

</div>