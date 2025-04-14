<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $profile['app_name'] ?> - Login Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- STYLESHEETS -->
  <link rel="shortcut icon" href="<?= base_url() ?>images/logos/<?= $profile['logo'] ?>" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- JAVASCRIPTS -->
  <!-- jQuery -->
  <script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>dist/js/adminlte.min.js"></script>
  <!-- Custom Script -->
  <script>
    $(document).ready(function() {
      setTimeout(function() {
        $('#flash_error').fadeOut()
      }, 750);
    })
  </script>
</head>

<body class="hold-transition login-page text-sm">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <div class="login-logo">
          <img src="<?= base_url() ?>images/logos/<?= $profile['logo'] ?>" alt="<?= $profile['app_name'] ?>" height="70">
        </div>
        <h5 class="text-center"><?= $profile['app_name'] ?></h5>
        <p class="login-box-msg">Silakan masuk untuk melanjutkan.</p>
        <form action="<?= site_url() ?>/auth/login/action" method="post">
          <div class="input-group mb-3">
            <input type="user_name" class="form-control form-control-sm" name="user_name" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control form-control-sm" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember" value="1">
                <label for="remember">
                  Ingat Saya
                </label>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-sm btn-primary btn-block">Masuk</button>
            </div>
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
    <?php if (@$this->session->flashdata('flash_error')) : ?>
      <div class="row" id="flash_error">
        <div class="col-12">
          <div class="alert alert-danger alert-dismissible">
            <?= $this->session->flashdata('flash_error') ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
  <!-- /.login-box -->
</body>

</html>