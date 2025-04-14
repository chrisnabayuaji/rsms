<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$profile['abbreviation']?> - Access Forbidden!</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- STYLESHEETS -->
    <link rel="shortcut icon" href="<?=base_url()?>images/logos/<?=$profile['logo']?>" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url()?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?=base_url()?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url()?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- JAVASCRIPTS -->
    <!-- jQuery -->
    <script src="<?=base_url()?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?=base_url()?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url()?>dist/js/adminlte.min.js"></script>
  </head>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <div class="error-page">
        <h2 class="headline text-danger">403</h2>
        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Akses Dilarang!</h3>
          <p>
            Anda tidak diperbolehkan mengakses fitur ini.</br>
            <a href="<?=site_url()?>">Kembali ke aplikasi.</a>.
          </p>
        </div>
      </div>
    </div>
  </body>
</html>
