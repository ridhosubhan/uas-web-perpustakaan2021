<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="index.html" class="logo"><i class="mdi mdi-book-open-page-variant"></i> Perpustakaan</a>
            <!-- <a href="index.html" class="logo"><img src="assets/images/logo.png" height="24" alt="logo"></a> -->
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Menu Utama</li>
                <li>
                    <a href="<?= BASEPATH ?>" class="waves-effect <?= $title == 'Dashboard' ? 'active' : ''; ?>">
                        <i class="mdi mdi-airplay"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect <?php if($title == 'Data Buku' || $title == 'Data Rak') echo 'active'; ?>"><i class="ion-android-storage"></i> <span> Buku & Rak </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li class="waves-effect <?= $title == 'Data Buku' ? 'active' : ''; ?>"><a href="<?= BASEPATH?>/views/buku"><i class="fa fa-book"></i> Data Buku</a></li>
                        <li class="waves-effect <?= $title == 'Data Rak' ? 'active' : ''; ?>"><a href="<?= BASEPATH?>/views/rak"><i class="mdi mdi-package"></i> Data Rak</a></li>
                    </ul>
                </li>
                <li>
                    <a href="calendar.html" class="waves-effect"><i class="mdi mdi-calendar-clock"></i><span> Pengembalian </span></a>
                </li>

                <li class="menu-title">Data Pengguna</li>
                

                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user-secret"></i> <span> Petugas </span></a>
                </li>

                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-group"></i> <span> Anggota </span></a>
                </li>

                <li>
                    <a href="calendar.html" class="waves-effect"><i class="mdi mdi-account-settings-variant"></i><span> Akun </span></a>
                </li>

                <li class="menu-title">Pengaturan</li>
                <li>
                    <a href="calendar.html" class="waves-effect"><i class="mdi mdi-account-circle"></i><span> Profile </span></a>
                </li>
                <li>
                    <a href="calendar.html" class="waves-effect"><i class="mdi mdi-logout"></i><span> Logout </span></a>
                </li>


            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->