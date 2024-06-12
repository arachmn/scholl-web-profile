<div class="left main-sidebar">

    <div class="sidebar-inner leftscroll">

        <div id="sidebar-menu">

            <ul>

                <li class="submenu">
                    <a <?= url_is('admin') ? 'class="active"' : '' ?> href="<?= site_url('admin') ?>"><i class="fa fa-fw fa-bars"></i><span> Dashboard </span> </a>
                </li>

                <li class="submenu">
                    <a <?= url_is('admin/profil') || url_is('admin/profil/*') ? 'class="active"' : '' ?> href="<?= site_url('admin/profil') ?>"><i class="fa fa-fw fa-tv"></i><span> Profil Sekolah </span> </a>
                </li>

                <li class="submenu">
                    <a <?= url_is('admin/fasilitas') || url_is('admin/fasilitas/*') ? 'class="active"' : '' ?> href="<?= site_url('admin/fasilitas') ?>"><i class="fa fa-fw fa-th"></i><span> Fasilitas </span> </a>
                </li>

                <li class="submenu">
                    <a <?= url_is('admin/daftar-guru') || url_is('admin/daftar-guru/*') ? 'class="active"' : '' ?> href="<?= site_url('admin/daftar-guru') ?>"><i class="fa fa-fw fa-users"></i><span> Daftar Guru </span> </a>
                </li>

                <li class="submenu">
                    <a <?= url_is('admin/berita') || url_is('admin/berita/*') ? 'class="active"' : '' ?> href="<?= site_url('admin/berita') ?>"><i class="fa fa-fw fa-file-text-o"></i><span> Berita Sekolah </span> </a>
                </li>

                <li class="submenu">
                    <a <?= url_is('admin/galeri-sekolah') || url_is('admin/galeri-sekolah/*') ? 'class="active"' : '' ?> href="<?= site_url('admin/galeri-sekolah') ?>"><i class="fa fa-fw fa-image"></i><span> Galeri Sekolah </span> </a>
                </li>

                <li class="submenu">
                    <a <?= url_is('admin/ppdb') || url_is('admin/ppdb/*') ? 'class="active"' : '' ?> href="<?= site_url('admin/ppdb') ?>"><i class="fa fa-fw fa-copy"></i><span> PPDB Online </span> </a>
                </li>

                <li class="submenu">
                    <a <?= url_is('admin/admin') || url_is('admin/admin/*') ? 'class="active"' : '' ?> href="<?= site_url('admin/admin') ?>"><i class="fa fa-fw fa-user"></i><span> Admin </span> </a>
                </li>

            </ul>

            <div class="clearfix"></div>

        </div>

        <div class="clearfix"></div>

    </div>

</div>