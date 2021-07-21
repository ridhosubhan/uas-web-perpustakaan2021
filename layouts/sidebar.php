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
                
                <?php if(is_admin()) : ?>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect <?php if($title == 'Data Petugas' || $title == 'Data Anggota' || $title == 'Data Akun') echo 'active'; ?>"><i class="mdi mdi-view-dashboard"></i> <span> Master Data </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="list-unstyled">                       
                            <li class="<?= $title == 'Data Petugas' ? 'active' : ''; ?>"><a href="<?= BASEPATH?>views/petugas" class="waves-effect"><i class="fa fa-user-secret"></i> <span> Data Petugas</span></a></li>
                            <li class="<?= $title == 'Data Anggota' ? 'active' : ''; ?>"><a href="<?= BASEPATH?>views/anggota" class="waves-effect"><i class="fa fa-group"></i> <span> Data Anggota </span></a></li>
                            <li class="<?= $title == 'Data Akun' ? 'active' : ''; ?>"><a href="<?= BASEPATH?>views/akun" class="waves-effect"><i class="mdi mdi-account-settings-variant"></i><span> Data Akun </span></a></li>
                        </ul>
                    </li> 

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect <?php if($title == 'Data Buku' || $title == 'Data Rak') echo 'active'; ?>"><i class="ion-android-storage"></i> <span> Katalog Buku </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="list-unstyled">
                            <li class="<?= $title == 'Data Buku' ? 'active' : ''; ?>"><a href="<?= BASEPATH?>views/buku" class="waves-effect"><i class="fa fa-book"></i> Data Buku </a></li>
                            <li class="<?= $title == 'Data Rak' ? 'active' : ''; ?>"><a href="<?= BASEPATH?>views/rak" class="waves-effect"><i class="mdi mdi-package"></i> Data Rak </a></li>
                        </ul>
                    </li>
                <?php endif; ?>

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect <?php if($title == 'Peminjaman' || $title == 'Transaksi Saya' || $title == 'Data Peminjaman' || $title == 'Data Pengembalian') echo 'active'; ?>"><i class="fa fa-shopping-cart"></i> <span> Data Transaksi </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="list-unstyled">
                            <?php if(not_admin()) : ?>
                                <li class="<?= $title == 'Peminjaman' ? 'active' : ''; ?>"><a href="<?= BASEPATH?>views/peminjaman" class="waves-effect"><i class="mdi mdi-book-open"></i> Peminjaman</a></li>
                                <li class="<?= $title == 'Transaksi Saya' ? 'active' : ''; ?>"><a href="<?= BASEPATH?>views/peminjaman" class="waves-effect"><i class="fa fa-opencart"></i> Transaksi Saya</a></li>
                            <?php endif; ?>    
                            <?php if(is_admin()) : ?>
                                <li class="<?= $title == 'Data Peminjaman' ? 'active' : ''; ?>"><a href="<?= BASEPATH?>views/datapeminjaman" class="waves-effect"><i class="fa fa-calendar-o"></i> Data Peminjaman</a></li>
                                <li class="<?= $title == 'Data Pengembalian' ? 'active' : ''; ?>"><a href="<?= BASEPATH?>views/pengembalian" class="waves-effect"><i class="fa fa-calendar"></i> Data Pengembalian</a></li>
                            <?php endif; ?>    
                        </ul>
                    </li>

                <li class="menu-title">Pengaturan</li>
                <li>
                    <a href="<?= BASEPATH?>profile" class="waves-effect"><i class="mdi mdi-account-circle"></i><span> Profile </span></a>
                </li>
                <li>
                    <a href="<?= BASEPATH?>logout.php" class="waves-effect"><i class="mdi mdi-logout"></i><span> Logout </span></a>
                </li>


            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->