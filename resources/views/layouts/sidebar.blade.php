<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard') }}"
                        aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                            class="hide-menu">Dashboard</span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('produk') }}"
                        aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span
                            class="hide-menu">Produk</span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="tables.html"
                        aria-expanded="false"><i class="mdi mdi-border-inside"></i><span
                            class="hide-menu">Pemesanan</span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="grid.html"
                        aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Laporan
                            Penjualan</span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Users </span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="form-basic.html" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span
                                    class="hide-menu"> My Profile </span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="form-wizard.html" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span
                                    class="hide-menu"> Logout </span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->