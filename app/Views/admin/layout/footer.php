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
<footer class="footer">
    <span class="text-right">
        Copyright <a target="_blank" href="#"><?= $dProfile->name ?></a>
    </span>
    <span class="float-right">
        Powered by <a target="_blank" href="#"><b><?= $dProfile->panel ?></b></a>
    </span>
</footer>