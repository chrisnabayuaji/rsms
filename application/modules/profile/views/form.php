<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><i class="<?= @$menu['icon'] ?>"></i> <?= @$menu['menu_name'] ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Pengaturan</li>
            <li class="breadcrumb-item active"><?= @$menu['menu_name'] ?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div><!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Form <?= $menu['menu_name'] ?></h3>
            </div>
            <form id="form" action="<?= site_url() . '/' . $menu['controller'] . '/save/' ?>" enctype="multipart/form-data" method="post" autocomplete="off">
              <div class="card-body">
                <div class="flash-error" data-flasherror="<?= $this->session->flashdata('flash_error') ?>"></div>
                <h5>Aplikasi</h5>
                <div class="form-group row mb-1">
                  <label for="menu" class="col-sm-2 col-form-label text-right">Nama Aplikasi <span class="text-danger">*</span></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" name="app_name" id="app_name" value="<?= @$main['app_name'] ?>" required>
                  </div>
                </div>
                <div class="form-group row mb-1">
                  <label for="menu" class="col-sm-2 col-form-label text-right">Singkatan <span class="text-danger">*</span></label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" name="short_name" id="short_name" value="<?= @$main['short_name'] ?>" required>
                  </div>
                </div>
                <div class="form-group row mb-1">
                  <label for="menu" class="col-sm-2 col-form-label text-right">Deskripsi <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" name="description" id="description" value="<?= @$main['description'] ?>" required>
                  </div>
                </div>
                <div class="form-group row mb-1">
                  <label for="menu" class="col-sm-2 col-form-label text-right">Tahun Pembuatan <span class="text-danger">*</span></label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" name="start_year" id="start_year" value="<?= @$main['start_year'] ?>" required>
                  </div>
                </div>
                <div class="form-group row mb-1">
                  <label for="menu" class="col-sm-2 col-form-label text-right">Versi <span class="text-danger">*</span></label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" name="version" id="version" value="<?= @$main['version'] ?>" required>
                  </div>
                </div>
                <h5>Perusahaan / Instansi</h5>
                <div class="form-group row mb-1">
                  <label for="menu" class="col-sm-2 col-form-label text-right">Perusahaan / Instansi <span class="text-danger">*</span></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" name="company_name" id="company_name" value="<?= @$main['company_name'] ?>" required>
                  </div>
                </div>
                <div class="form-group row mb-1">
                  <label for="menu" class="col-sm-2 col-form-label text-right">Alamat <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" name="address" id="address" value="<?= @$main['address'] ?>" required>
                  </div>
                </div>
                <h5>Kontak</h5>
                <div class="form-group row mb-1">
                  <label for="menu" class="col-sm-2 col-form-label text-right">Telpon <span class="text-danger">*</span></label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control form-control-sm" name="phone" id="phone" value="<?= @$main['phone'] ?>" required>
                  </div>
                </div>
                <div class="form-group row mb-1">
                  <label for="menu" class="col-sm-2 col-form-label text-right">Fax <span class="text-danger">*</span></label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control form-control-sm" name="fax" id="fax" value="<?= @$main['fax'] ?>" required>
                  </div>
                </div>
                <div class="form-group row mb-1">
                  <label for="menu" class="col-sm-2 col-form-label text-right">Email <span class="text-danger">*</span></label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control form-control-sm" name="email" id="email" value="<?= @$main['email'] ?>" required>
                  </div>
                </div>
                <h5>Logo</h5>
                <div class="form-group row mb-1">
                  <label for="url" class="col-sm-2 col-form-label text-right">Logo</label>
                  <div class="col-sm-4 ">
                    <input type="file" class="" name="logo" id="logo">
                    <input type="hidden" class="" name="old_logo" id="old_logo" value="<?= @$main['logo'] ?>">
                    <br>
                    <img src="<?= base_url() ?>images/logos/<?= @$main['logo'] ?>" class="img-thumbnail mt-3 mb-3" style="max-height:150px" alt="User Image">
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-md-10 offset-md-2">
                    <button type="submit" class="btn btn-sm btn-primary btn-submit"><i class="fas fa-save"></i> Simpan</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div><!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
  $(document).ready(function() {
    $("#form").validate({
      rules: {

      },
      messages: {

      },
      errorElement: "em",
      errorPlacement: function(error, element) {
        error.addClass("invalid-feedback");
        if (element.prop("type") === "checkbox") {
          error.insertAfter(element.next("label"));
        } else if ($(element).hasClass('select2')) {
          error.insertAfter(element.next(".select2-container")).addClass('mt-1');
        } else {
          error.insertAfter(element);
        }
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass("is-invalid").removeClass("is-valid");
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).addClass("is-valid").removeClass("is-invalid");
      },
      submitHandler: function(form) {
        $(".btn-submit").html('<i class="fas fa-spin fa-spinner"></i> Proses');
        $(".btn-submit").addClass('disabled');
        $(".btn-cancel").addClass('disabled');
        form.submit();
      }
    });
  })
</script>