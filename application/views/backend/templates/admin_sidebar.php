<?php
$menu = '';
$menu1 = $this->db->select('*')->from('tbl_menu')
    ->join('tbl_access_menu', 'tbl_menu.id_menu=tbl_access_menu.id_menu')
    ->where('tbl_access_menu.id_role', $this->session->userdata('id_role'))
    ->where('is_head_section', 1)
    ->where('is_active', 1)
    ->order_by('tbl_access_menu.id_menu', 'ASC')
    ->get()->result_array();

$no = 0;
foreach ($menu1 as $key) {
    $menu2 = $this->db->select('*')->from('tbl_menu')
        ->join('tbl_access_menu', 'tbl_menu.id_menu=tbl_access_menu.id_menu')
        ->where('tbl_access_menu.id_role', $this->session->userdata('id_role'))
        ->where('is_head_section', 0)
        ->where('parent', $key['id_menu'])
        ->where('is_active', 1)
        ->order_by('tbl_access_menu.id_menu', 'ASC')
        ->get()->result_array();

    $menu1[$no]['menuChild'] = $menu2;
    $no++;
}
?>

<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="profile.html"><img src="<?= base_url() ?>assets/backend/img/images.png" class="img-circle" width="80"></a></p>
            <h5 class="centered"><?= $this->session->userdata('nama_user') ?></h5>
            <?php foreach ($menu1 as $key) : ?>
                <li class="mt">
                    <div class="sidebar-heading"><?= $key['nama_menu'] ?></div>
                    <?php foreach ($key['menuChild'] as $key2) : ?>
                        <?php if ($title == $key2['nama_menu']) : ?>
                            <a class="active" href="<?= base_url() . $key2['link_menu'] ?>" id="menubar">
                            <?php else : ?>
                                <a class="" href="<?= base_url() . $key2['link_menu'] ?>" id="menubar">
                                <?php endif; ?>
                                <i class="<?= $key2['icon_menu'] ?>"></i>
                                <span><?= $key2['nama_menu'] ?></span>
                                </a>
                            <?php endforeach; ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script>
    $('#menubar').on('click', function() {
        $('#menubar').removeClass('active');
        $(this).addClass('active');
    })
</script>