<?php
$this->db->select('*');
$this->db->from('tbl_menu');
$this->db->join('tbl_access_menu', 'tbl_access_menu.id_menu=tbl_menu.id_menu');
$this->db->join('tbl_role', 'tbl_role.id_role=tbl_access_menu.id_role');
$this->db->where('tbl_access_menu.id_role', $this->session->userdata('id_role'));
$this->db->where('tbl_menu.is_head_section', 1);
$data['menus'] = $this->db->get()->result_array();

?>

<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="<?= base_url('assets/backend') ?>/assets/img/brand/icon2-removebg-preview.png">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <?php foreach ($data['menus'] as $mn) : ?>
                        <h6 class="navbar-heading p-0 text-muted ml-3">
                            <span class="docs-normal"><?= $mn['nama_menu'] ?></span>
                        </h6>
                        <?php $menu = $this->db->get_where('tbl_menu', ['parent' => $mn['id_menu']])->result_array() ?>
                        <?php foreach ($menu as $m) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url() ?><?= $m['link_menu'] ?>">
                                    <i class="<?= $m['icon_menu'] ?> <?= $m['colors'] ?>"></i>
                                    <span class="nav-link-text"><?= $m['nama_menu'] ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</nav>