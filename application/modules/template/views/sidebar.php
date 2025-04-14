<!-- Main Sidebar Container -->
<aside class="main-sidebar <?=$profile['sidebar_variant'].$profile['sidebar_accent']?> elevation-4 <?php if($profile['sidebarnav_small_text'] == 1 ){echo 'text-sm';}?>">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link <?=$profile['brand_logo_variant']?>">
    <img src="<?=base_url()?>images/logos/<?=$profile['logo']?>" alt="<?=$profile['app_name']?>" class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light"><?=$profile['short_name']?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar <?php if($profile['sidebarnav_small_text'] == 1 ){echo 'text-sm';}?>">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex <?php if($profile['sidebarnav_small_text'] == 1 ){echo 'text-sm';}?>">
      <div class="image">
        <img src="<?=base_url()?>images/users/<?=@$this->session->userdata('photo')?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?=@$this->session->userdata('user_fullname');?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column <?php if($profile['legacy_sidebar'] == 1 ){echo 'nav-legacy';}?> <?php if($profile['flat_sidebar'] == 1 ){echo 'nav-flat';}?> <?php if($profile['compact_sidebar'] == 1 ){echo 'nav-compact';}?> <?php if($profile['nav_child_indent'] == 1 ){echo 'nav-child-indent';}?>" data-widget="treeview" role="menu" data-accordion="false">
        <?php foreach($sidenav as $lvl1):?>
          <?php if($lvl1['type'] == 1):?>
            <li class="nav-header"><?=$lvl1['menu_name']?></li>
          <?php else:?>
            <li class="nav-item has-treeview 
              <?php
                if (count($lvl1['child']) > 0) {
                  foreach ($lvl1['child'] as $lvl2) {
                    if ($lvl2['controller'] == $menu['controller']) {
                      echo 'menu-open';
                      break;
                    }
                  }
                }
              ?>
            ">
              <a href="<?php if(count($lvl1['child']) > 0){echo '#';}else{echo site_url().'/'.$lvl1['controller'].'/'.$lvl1['url'];}?>" 
                class="nav-link <?php if($lvl1['controller'] == $menu['controller']){echo 'active';}?> 
                <?php
                  if (count($lvl1['child']) > 0) {
                    foreach ($lvl1['child'] as $lvl2) {
                      if ($lvl2['controller'] == $menu['controller']) {
                        echo 'active';
                        break;
                      }
                    }
                  }
                ?>
                ">
                <i class="nav-icon <?=$lvl1['icon']?>"></i>
                <p>
                  <?=$lvl1['menu_name']?>
                  <?php if(count($lvl1['child']) > 0):?>
                    <i class="right fas fa-angle-left"></i>
                  <?php endif;?>
                </p>
              </a>
              <?php if(count($lvl1['child']) > 0):?>
                <ul class="nav nav-treeview">
                  <?php foreach($lvl1['child'] as $lvl2):?>
                    <li class="nav-item">
                      <a href="<?php echo site_url().'/'.$lvl2['controller'].'/'.$lvl2['url'];?>" class="nav-link <?php if($lvl2['controller'] == $menu['controller']){echo 'active';}?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p><?=$lvl2['menu_name']?></p>
                      </a>
                    </li>
                  <?php endforeach;?>
                </ul>
              <?php endif;?>
            </li>
          <?php endif;?>
        <?php endforeach;?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>