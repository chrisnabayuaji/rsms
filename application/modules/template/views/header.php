<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $profile['app_name'] ?> | <?= $menu['menu_name'] ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- STYLESHEETS -->
  <link rel="shortcut icon" href="<?= base_url() ?>images/logos/<?= $profile['logo'] ?>" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Pretty Checkbox -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/pretty-checkbox/pretty-checkbox.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/select2/css/select2.css">
  <link rel="stylesheet" href="<?= base_url() ?>plugins/select2-bootstrap4-theme/select2-bootstrap.css">
  <!-- Daterangepicker -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/daterangepicker/daterangepicker.css">
  <!-- Timepicker -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/bootstrap-timepicker/bootstrap-timepicker.min.css">
  <!-- Sweetalert2 -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/sweetalert2/sweetalert2.css">
  <link rel="stylesheet" href="<?= base_url() ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/toastr/toastr.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>dist/css/adminlte.min.css">
  <!-- Custom style -->
  <link rel="stylesheet" href="<?= base_url() ?>dist/css/custom.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    .pretty.p-icon {
      margin-right: 0px !important;
    }
  </style>

  <!-- JAVASCRIPTS -->
  <!-- jQuery -->
  <script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- JQuery Validation -->
  <script src="<?= base_url() ?>plugins/jquery-validation/jquery.validate.js"></script>
  <script src="<?= base_url() ?>plugins/jquery-validation/localization/messages_id.js"></script>
  <!-- Select2 -->
  <script src="<?= base_url() ?>plugins/select2/js/select2.full.js"></script>
  <!-- autoNumeric -->
  <script src="<?= base_url() ?>plugins/autoNumeric/autoNumeric-min.js"></script>
  <!-- Daterangepicker -->
  <script src="<?= base_url() ?>plugins/daterangepicker/moment.min.js"></script>
  <script src="<?= base_url() ?>plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Timepicker -->
  <script src="<?= base_url() ?>plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
  <!-- Sweetalert2 -->
  <script src="<?= base_url() ?>plugins/sweetalert2/sweetalert2.js"></script>
  <!-- Toastr -->
  <script src="<?= base_url() ?>plugins/toastr/toastr.min.js"></script>
  <!-- Chained -->
  <!-- <script src="<?= base_url() ?>plugins/jquery-chained/jquery.chained.min.js"></script> -->
  <!-- <script src="<?= base_url() ?>plugins/jquery-chained/jquery.chained.remote.min.js"></script> -->
  <!-- overlayScrollbars -->
  <script src="<?= base_url() ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- DataTables -->
  <script src="<?= base_url() ?>plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url() ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>dist/js/adminlte.min.js"></script>
  <!-- Custom Script -->
  <script>
    $(document).ready(function() {

      //lockscreen
      setTimeout(function() {
        window.location.replace("<?= site_url() . '/auth/locked/lock' ?>");
      }, 1000 * 60 * 60);

      //sweetalert
      // success message
      const flashSuccess = $('.flash-success').data('flashsuccess');
      if (flashSuccess) {
        toastr.success(flashSuccess);
      }

      // error message
      const flashError = $('.flash-error').data('flasherror');
      if (flashError) {
        toastr.error(flashError);
      }

      //delete confirm
      $('.btn-delete').on('click', function(e) {
        e.preventDefault();

        const href = $(this).attr('href');

        Swal.fire({
          title: 'Apakah Anda yakin?',
          text: "Aksi ini tidak bisa dikembalikan. Data ini mungkin terhubung dengan data lain.",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#eb3b5a',
          cancelButtonColor: '#b2bec3',
          confirmButtonText: 'Hapus',
          cancelButtonText: 'Batal',
          customClass: 'swal-wide'
        }).then((result) => {
          if (result.value) {
            document.location.href = href;
          }
        })
      })

      //select2
      $.fn.select2.defaults.set("theme", "bootstrap");
      $('.select2').select2();
      $('.select2-hidden').select2({
        minimumResultsForSearch: Infinity
      });

      //autonumeric
      $(".num-ori").autoNumeric('init', {
        aSep: '',
        aDec: '',
        aForm: true,
        vMax: '999999999999999999',
        vMin: '-999999999999999999'
      });
      $(".num-int").autoNumeric('init', {
        aSep: '.',
        aDec: ',',
        aForm: true,
        vMax: '999999999999999999',
        vMin: '-999999999999999999'
      });
      $(".num-float").autoNumeric('init', {
        aSep: '.',
        aDec: ',',
        aForm: true,
        vMax: '999999999999999999.99',
        vMin: '-999999999999999999.99',
        eDec: '0'
      });

      // timepicker
      $('.timepicker').timepicker({
        showInputs: true,
        showMeridian: false,
        showSeconds: true
      })

      // datepicker
      $('.datepicker').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
          cancelLabel: 'Clear',
          format: 'DD-MM-YYYY'
        },
        isInvalidDate: function(date) {
          return '';
        }
      })
      $('.datetimepicker').daterangepicker({
        timePicker: true,
        timePicker24Hour: true,
        timePickerSeconds: true,
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
          cancelLabel: 'Clear',
          format: 'DD-MM-YYYY H:mm:ss'
        },
        isInvalidDate: function(date) {
          return '';
        }
      })

    })

    // checkbox
    function checkItem() {
      $('#checkall').prop('checked', true);
      if ($('.checkitem:checked').length == $('.checkitem').length) {
        $(".checkall").prop('checked', true);
        $('.checkall-label').addClass('active');
      } else {
        $(".checkall").prop('checked', false);
        $('.checkall-label').removeClass('active');
      }
    }

    function checkAll(obj) {
      if (obj.checked) {
        $('.checkitem').prop('checked', true);
      } else {
        $('.checkitem').prop('checked', false);
      }
    }

    function multipleAction(type) {
      var desc;
      var confirmColor;
      var confirmButton;
      switch (type) {
        case 'enable':
          desc = 'Data ini mungkin terhubung dengan data lain.';
          confirmColor = '#5cb85c';
          confirmButton = 'Aktifkan';
          break;

        case 'disable':
          desc = 'Data ini mungkin terhubung dengan data lain.';
          confirmColor = '#d9534f';
          confirmButton = 'Non Aktifkan';
          break;

        case 'delete':
          desc = 'Aksi ini tidak bisa diurungkan. Data ini mungkin terhubung dengan data lain.';
          confirmColor = '#d9534f';
          confirmButton = 'Hapus';
      }
      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: desc,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: confirmColor,
        confirmButtonText: confirmButton,
        cancelButtonColor: '#b2bec3',
        cancelButtonText: 'Batal',
        customClass: 'swal-wide'
      }).then((result) => {
        if (result.value) {
          $('#form-multiple').attr('action', '<?= site_url() . '/' . $menu['controller'] ?>/multiple/' + type).submit();
        }
      })
    }
  </script>
</head>

<body class="hold-transition sidebar-mini <?php if ($profile['layout_fixed'] == 1) {
                                            echo 'layout-fixed ';
                                          }
                                          if ($profile['layout_navbar_fixed'] == 1) {
                                            echo 'layout-navbar-fixed ';
                                          }
                                          if ($profile['layout_footer_fixed'] == 1) {
                                            echo 'layout-footer-fixed ';
                                          }
                                          if ($profile['body_small_text'] == 1) {
                                            echo 'text-sm ';
                                          } ?>">
  <div class="wrapper">