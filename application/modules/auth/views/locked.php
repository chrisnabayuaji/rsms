<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $profile['app_name'] ?> | Lockscreen</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?= base_url() ?>images/logos/<?= $profile['logo'] ?>" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- jQuery -->
  <script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Toastr -->
  <script src="<?= base_url() ?>plugins/toastr/toastr.min.js"></script>
  <script>
    $(document).ready(() => {
      const flashError = $('.flash-error').data('flasherror');
      if (flashError) {
        toastr.error(flashError)
      }
    });
  </script>
</head>

<body class="hold-transition lockscreen">
  <!-- Automatic element centering -->
  <div class="lockscreen-wrapper">
    <div class="flash-error" data-flasherror="<?= @$this->session->flashdata('flash_error') ?>"></div>
    <div class="lockscreen-logo">
      <a href="<?= base_url() ?>"><?= $profile['app_name'] ?></a>
    </div>
    <!-- User name -->
    <div class="lockscreen-name"><?= @$this->session->userdata('user_fullname') ?></div>

    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
      <!-- lockscreen image -->
      <div class="lockscreen-image">
        <img src="<?= base_url() ?>images/users/<?= @$this->session->userdata('photo') ?>" alt="User Image">
      </div>
      <!-- /.lockscreen-image -->

      <!-- lockscreen credentials (contains the form) -->
      <form class="lockscreen-credentials" action="<?= site_url() ?>/auth/locked/action" method="POST" autocomplete="off">
        <div class="input-group">
          <input type="password" class="form-control" name="password" placeholder="password">
          <div class="input-group-append">
            <button type="submit" class="btn"><i class="fas fa-arrow-right text-muted"></i></button>
          </div>
        </div>
      </form>
      <!-- /.lockscreen credentials -->

    </div>
    <!-- /.lockscreen-item -->
    <div class="help-block text-center">
      Masukkan kata sandi untuk mengembalikan sesi!
    </div>
    <div class="text-center">
      <a href="<?= site_url() ?>/auth/logout/action ">Atau masuk dengan pengguna lain.</a>
    </div>
    <div class="lockscreen-footer text-center">
      Copyright &copy; <?= date('Y') ?> <?= $profile['app_name'] ?><br>
      All rights reserved
    </div>
  </div>
  <!-- /.center -->
</body>

</html>