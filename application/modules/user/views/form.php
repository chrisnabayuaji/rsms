<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-0">
        <div class="col-sm-6">
          <h5 class="m-0 text-dark"><i class="<?= @$menu['icon'] ?>"></i> <?= @$menu['menu_name'] ?></h5>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Pengaturan</li>
            <li class="breadcrumb-item active"><?= @$menu['menu_name'] ?></li>
            <li class="breadcrumb-item active"><?= ($id == null) ? 'Tambah' : 'Ubah'; ?></li>
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
            <form id="form" action="<?= site_url() . '/' . $menu['controller'] . '/save/' . $id ?>" method="post" autocomplete="off" enctype="multipart/form-data">
              <div class="card-body">
                <div class="flash-error" data-flasherror="<?= $this->session->flashdata('flash_error') ?>"></div>
                <input type="hidden" class="form-control form-control-sm" name="user_id" id="user_id" value="<?= @$main['user_id'] ?>" required>
                <?php if ($id != null) : ?>
                  <input type="hidden" class="form-control form-control-sm" name="old" id="old" value="<?= @$main['user_name'] ?>" required>
                <?php endif; ?>
                <div class="form-group row mb-1">
                  <label for="role_id" class="col-sm-2 col-form-label text-right">Role <span class="text-danger">*</span></label>
                  <div class="col-sm-2">
                    <select class="form-control form-control-sm select2" name="role_id" id="role_id" required>
                      <option value="">---</option>
                      <?php foreach ($role as $r) : ?>
                        <option value="<?= $r['role_id'] ?>" <?= (@$main['role_id'] == $r['role_id']) ? 'selected' : '' ?>><?= $r['role_name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-1">
                  <label for="menu" class="col-sm-2 col-form-label text-right">Nama Lengkap <span class="text-danger">*</span></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" name="user_fullname" id="user_fullname" value="<?= @$main['user_fullname'] ?>" required>
                  </div>
                </div>
                <div class="form-group row mb-1">
                  <label for="menu" class="col-sm-2 col-form-label text-right">Nama Pengguna <span class="text-danger">*</span></label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control form-control-sm" name="user_name" id="user_name" value="<?= @$main['user_name'] ?>" required>
                  </div>
                </div>
                <!-- <div class="form-group row mb-1">
                  <label for="menu" class="col-sm-2 col-form-label text-right">Email </label>
                  <div class="col-sm-3">
                    <input type="email" class="form-control form-control-sm" name="email" id="email" value="<?= @$main['email'] ?>">
                  </div>
                </div>
                <div class="form-group row mb-1">
                  <label for="menu" class="col-sm-2 col-form-label text-right">Telepon </label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control form-control-sm" name="phone" id="phone" value="<?= @$main['phone'] ?>">
                  </div>
                </div> -->
                <?php if ($id == null) : ?>
                  <div class="form-group row mb-1">
                    <label for="icon" class="col-sm-2 col-form-label text-right">Password <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                      <input type="password" class="form-control form-control-sm" name="password" id="password" value="<?= @$main['password'] ?>" required>
                    </div>
                  </div>
                  <div class="form-group row mb-1">
                    <label for="icon" class="col-sm-2 col-form-label text-right">Ulang Password <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                      <input type="password" class="form-control form-control-sm" name="password_confirm" id="password_confirm" value="<?= @$main['password_agian'] ?>" required>
                    </div>
                  </div>
                <?php endif; ?>
                <div class="form-group row mb-1">
                  <label for="menu" class="col-sm-2 col-form-label text-right">Photo</label>
                  <div class="col-sm-3">
                    <input type="file" class="" name="photo" id="photo">
                    <input type="hidden" name="old_photo" id="old_photo" value="<?= @$main['photo'] ?>">
                  </div>
                </div>
                <?php if ($id != null) : ?>
                  <div class="form-group row mb-1">
                    <label for="menu" class="col-sm-2 col-form-label text-right"></label>
                    <div class="col-sm-2">
                      <img src="<?= base_url() ?>images/users/<?= @$main['photo'] ?>" alt="<?= @$main['photo'] ?>" class="img-thumbnail">
                    </div>
                  </div>
                <?php endif; ?>
                <div class="form-group row mb-1">
                  <label for="url" class="col-sm-2 col-form-label text-right">Aktif</label>
                  <div class="col-sm-3">
                    <div class="pretty p-icon mt-2">
                      <input class="icheckbox" type="checkbox" name="is_active" id="is_active" value="1" <?= @$main ? (@$main['is_active'] == 1 ? 'checked' : '') : 'checked' ?>>
                      <div class="state">
                        <i class="icon fas fa-check"></i><label></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-md-10 offset-md-2">
                    <button type="submit" class="btn btn-sm btn-primary btn-submit"><i class="fas fa-save"></i> Simpan</button>
                    <a class="btn btn-sm btn-default btn-cancel" href="<?= site_url() . '/' . $menu['controller'] . '/' . $menu['url'] ?>"><i class="fas fa-times"></i> Batal</a>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php if ($id != null) : ?>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Ganti Password <?= $menu['menu_name'] ?></h3>
              </div>
              <form id="form_password" action="<?= site_url() . '/' . $menu['controller'] . '/save_password/' . $id ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="flash-error" data-flasherror="<?= $this->session->flashdata('flash_error') ?>"></div>
                  <input type="hidden" class="form-control form-control-sm" name="user_id" id="user_id" value="<?= @$main['user_id'] ?>" required>
                  <div class="form-group row mb-1">
                    <label for="icon" class="col-sm-2 col-form-label text-right">Password <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                      <input type="password" class="form-control form-control-sm" name="password" id="password" value="<?= @$main['password'] ?>" required>
                    </div>
                  </div>
                  <div class="form-group row mb-1">
                    <label for="icon" class="col-sm-2 col-form-label text-right">Ulang Password <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                      <input type="password" class="form-control form-control-sm" name="password_confirm" id="password_confirm" value="<?= @$main['password_agian'] ?>" required>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-md-10 offset-md-2">
                      <button type="submit" class="btn btn-sm btn-primary btn-submit"><i class="fas fa-save"></i> Simpan</button>
                      <a class="btn btn-sm btn-default btn-cancel" href="<?= site_url() . '/' . $menu['controller'] . '/' . $menu['url'] ?>"><i class="fas fa-times"></i> Batal</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div><!-- /.container-fluid -->
  </div><!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
  $(document).ready(function() {
    $("#form").validate({
      rules: {
        password: {
          minlength: 5
        },
        password_confirm: {
          minlength: 5,
          equalTo: "#password"
        },
        user_name: {
          remote: {
            type: 'post',
            url: "<?= site_url() . '/' . $menu['controller'] . '/ajax/check_old/' . $id ?>",
            data: {
              'user_name': function() {
                return $('#user_name').val();
              }
            },
            dataType: 'json'
          }
        }
      },
      messages: {
        password_confirm: {
          minlength: 5,
          equalTo: "Password tidak sama"
        },
        user_name: {
          remote: "Nama pengguna sudah digunakan"
        }
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

    $("#form_password").validate({
      rules: {
        password: {
          minlength: 5
        },
        password_confirm: {
          minlength: 5,
          equalTo: "#password"
        }
      },
      messages: {
        password_confirm: {
          minlength: 5,
          equalTo: "Password tidak sama"
        }
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