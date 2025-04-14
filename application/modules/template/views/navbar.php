<!-- Navbar -->
<nav class="main-header navbar navbar-expand <?=urldecode($profile['navbar_variant'])?> <?php if($profile['navbar_border'] == 1){echo 'border-bottom-0';};?> <?php if($profile['navbar_small_text']==1){echo 'text-sm';}?>">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i><?=$profile['app_name']?> V <?=$profile['version']?></i>
      </a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-user"></i>
        <?=@$this->session->userdata('user_fullname');?>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="<?=site_url().'/auth/locked/lock'?>" class="dropdown-item">
          <i class="fas fa-lock"></i> Lock
        </a>
        <a href="<?=site_url().'/auth/logout/action'?>" class="dropdown-item">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </div>
    </li>
  </ul>
</nav>
<!-- /.navbar -->