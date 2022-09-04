 <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-clinic-medical"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIM Klinik</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- QUERY MENU -->
      <?php
      $id_level_users = $this->session->userdata('id_level_user');
      $queryMenu = "SELECT `tb_user_menu`.`id_menu`,`menu`
                      FROM `tb_user_menu` JOIN `tb_user_access_menu` 
                        ON `tb_user_menu`.`id_menu` = `tb_user_access_menu`.`id_menu`
                     WHERE `tb_user_access_menu`.`id_level_user` = $id_level_users
                  ORDER BY `tb_user_access_menu`.`id_menu` ASC
                  ";
      $menu = $this->db->query($queryMenu)->result_array();
      ?>

      <!-- LOOPING MENU -->
      <?php foreach ($menu as $m) : ?>
      <div class="sidebar-heading">
        <?= $m['menu'];?>
      </div>
      
          <!-- QUERY SUB MENU -->
          <?php
          $menuId = $m['id_menu'];
          $querySubMenu = "SELECT *
                            FROM `tb_user_sub_menu` JOIN `tb_user_menu` 
                              ON `tb_user_sub_menu`.`id_menu` = `tb_user_menu`.`id_menu`
                           WHERE `tb_user_sub_menu`.`id_menu` = $menuId 
                             AND `tb_user_sub_menu`.`is_active` = 1
                        ";
          $subMenu = $this->db->query($querySubMenu)->result_array();
          ?>
          <?php foreach($subMenu as $sm) : ?>
            <?php if ($title == $sm['title']): ?>
            <li class="nav-item active">
            <?php else : ?>
            <li class="nav-item">
            <?php endif; ?>
              <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                <i class="<?= $sm['icon']; ?>"></i>
                  <span><?= $sm['title']; ?></span></a>
            </li>
          <?php endforeach;?>      

      <?php endforeach; ?>

       <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/Logout');?>" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->