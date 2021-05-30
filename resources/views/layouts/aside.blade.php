<aside class="main-sidebar">
    <section class="sidebar">
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="/admin"> <i class="menu-icon fa fa-dashboard"></i>Beranda </a>
            </li>
            <li>
                <a href="{{route('kategori.index')}}"> <i class="menu-icon fa fa-th-list"></i>Kategori</a>
            </li>
            <li>
                <a href="{{route('makanan.index')}}"> <i class="menu-icon fa fa-coffee"></i>Data Makanan</a>
            </li>
            <li>
                <a href="{{route('meja.index')}}"> <i class="menu-icon fa fa-compass"></i>Data Meja</a>
            </li>
            <li>
                <a href="{{route('customer.index')}}"> <i class="menu-icon fa fa-users"></i>Data Pelanggan</a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="menu-icon fa fa-shopping-cart"></i> <span><strong>Data Pemesanan</strong></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('pending-order')}}"><i class="fa fa-circle-o"></i> Pending Order</a></li>
                    <li><a href="{{route('all-order')}}"><i class="fa fa-circle-o"></i> Complete Order</a></li>
                </ul>
            </li>
            <li>
                <a href="/Laporan"> <i class="menu-icon fa fa-file-pdf-o"></i>Cetak Laporan</a>
            </li>
            <h3 class="menu-title"></h3><!-- /.menu-title -->

            <li>
                <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </li>
        </ul>
    </section>
</aside>