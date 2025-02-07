<?php
$db = \Config\Database::Connect();
$session = \Config\Services::session();

if ($session->has('id_admin')) {
    $idAdmin = $session->get('id_admin');
} else {
    $idAdmin = '1';
}

$dProfile = $db->query("SELECT * FROM tb_profile WHERE id_profile = 1")->getRow();
$dAdmin = $db->query("SELECT * FROM tb_admin WHERE id_admin = '$idAdmin'")->getRow();
?>
<div class="headerbar">

    <!-- LOGO -->
    <div class="headerbar-left">
        <a href="<?= site_url('admin') ?>" class="logo"><img alt="Logo" src="<?= base_url('img/profile/' . $dProfile->logo) ?>" /> <span><?= $dProfile->panel ?></span></a>
    </div>

    <nav class=" navbar-custom">

        <ul class="list-inline float-right mb-0">

            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="<?= base_url('img/admin/') . $dAdmin->image ?>" alt="Profile image" class="avatar-rounded">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="text-overflow"><small>Hello, <?= $dAdmin->name ?></small> </h5>
                    </div>

                    <!-- item-->

                    <!-- item-->
                    <a href="<?= base_url('AuthController/logout') ?>" class="dropdown-item notify-item">
                        <i class="fa fa-power-off"></i> <span>Logout</span>
                    </a>
                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
            </li>
        </ul>

    </nav>

</div>