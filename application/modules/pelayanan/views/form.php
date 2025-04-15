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
            <li class="breadcrumb-item active">Menu utama</li>
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
            <form id="form" action="<?= site_url() . '/' . $menu['controller'] . '/save/' . $id ?>" method="post" autocomplete="off">
              <div class="card-body">
                <div class="flash-error" data-flasherror="<?= $this->session->flashdata('flash_error') ?>"></div>
                <input type="hidden" class="form-control form-control-sm" name="pelayanan_id" id="pelayanan_id" value="<?= @$main['pelayanan_id'] ?>" required>
                <?php if ($id != null) : ?>
                  <input type="hidden" class="form-control form-control-sm" name="old" id="old" value="<?= @$main['role_name'] ?>" required>
                <?php endif; ?>
                <div class="form-group row mb-1">
                  <label class="col-sm-2 col-form-label text-right">No Rekam Medis <span class="text-danger">*</span></label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" name="rm_no" id="rm_no" value="<?= @$main['rm_no'] ?>" required>
                  </div>
                </div>
                <div class="form-group row mb-1">
                  <label class="col-sm-2 col-form-label text-right">Nama Pasien <span class="text-danger">*</span></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" name="pasien_name" id="pasien_name" value="<?= @$main['pasien_name'] ?>" required>
                  </div>
                </div>
                <div class="form-group row mb-1">
                  <label class="col-sm-2 col-form-label text-right">Jenis Kelamin <span class="text-danger">*</span></label>
                  <div class="col-sm-2">
                    <select class="form-control form-control-sm select2" name="jk" id="jk" required>
                      <option value="L" <?= @$main['jk'] == 'L' ? 'checked' : '' ?>>Laki-laki</option>
                      <option value="P" <?= @$main['jk'] == 'P' ? 'checked' : '' ?>>Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-1">
                  <label class="col-sm-2 col-form-label text-right">Umur <span class="text-danger">*</span></label>
                  <div class="col-sm-2">
                    <div class="input-group input-group-sm mb-1">
                      <input type="number" class="form-control form-control-sm" name="umur_thn" id="umur_thn" value="<?= @$main['umur_thn'] ?>" required>
                      <div class="input-group-append">
                        <span class="input-group-text">Tahun</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="input-group input-group-sm mb-1">
                      <input type="number" class="form-control form-control-sm" name="umur_bln" id="umur_bln" value="<?= @$main['umur_bln'] ?>" required>
                      <div class="input-group-append">
                        <span class="input-group-text">Bulan</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="input-group input-group-sm mb-1">
                      <input type="number" class="form-control form-control-sm" name="umur_hr" id="umur_hr" value="<?= @$main['umur_hr'] ?>" required>
                      <div class="input-group-append">
                        <span class="input-group-text">Hari</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row mb-1">
                  <label class="col-sm-2 col-form-label text-right">Tgl. Masuk RS <span class="text-danger">*</span></label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm datetimepicker" name="masuk_rs_tgl" id="masuk_rs_tgl" value="<?= @reverse_date($main['masuk_rs_tgl'], '-', 'full_date') ?>" required>
                  </div>
                </div>
                <div class="form-group row mb-1">
                  <label class="col-sm-2 col-form-label text-right">DPJP <span class="text-danger">*</span></label>
                  <div class="col-sm-3">
                    <select class="form-control form-control-sm select2" name="dpjp_id" id="dpjp_id" required>
                      <option value="">---</option>
                      <?php foreach ($all_dpjp as $r) : ?>
                        <option value="<?= $r['user_id'] ?>" <?= (@$main['dpjp_id'] == $r['user_id']) ? 'selected' : '' ?>><?= $r['user_fullname'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-1">
                  <label class="col-sm-2 col-form-label text-right">Residen <span class="text-danger">*</span></label>
                  <div class="col-sm-3">
                    <select class="form-control form-control-sm select2" name="residen_id" id="residen_id" required>
                      <option value="">---</option>
                      <?php foreach ($all_residen as $r) : ?>
                        <option value="<?= $r['user_id'] ?>" <?= (@$main['residen_id'] == $r['user_id']) ? 'selected' : '' ?>><?= $r['user_fullname'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-1">
                  <label class="col-sm-2 col-form-label text-right">Bangsal <span class="text-danger">*</span></label>
                  <div class="col-sm-3">
                    <select class="form-control form-control-sm select2" name="bangsal_id" id="bangsal_id" required>
                      <option value="">---</option>
                      <?php foreach ($all_lokasi as $r) : ?>
                        <option value="<?= $r['lokasi_id'] ?>" <?= (@$main['bangsal_id'] == $r['lokasi_id']) ? 'selected' : '' ?>><?= $r['lokasi_name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-1">
                  <label class="col-sm-2 col-form-label text-right">Nomor Kamar <span class="text-danger">*</span></label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" name="kamar_no" id="kamar_no" value="<?= @$main['kamar_no'] ?>" required>
                  </div>
                </div>
                <div class="form-group row mb-1">
                  <label class="col-sm-2 col-form-label text-right">Aktif</label>
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
    </div><!-- /.container-fluid -->
  </div><!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
  $(document).ready(function() {
    $("#form").validate({
      rules: {
        role_name: {
          remote: {
            type: 'post',
            url: "<?= site_url() . '/' . $menu['controller'] . '/ajax/check_id/' . $id ?>",
            data: {
              'role_name': function() {
                return $('#role_name').val();
              }
            },
            dataType: 'json'
          }
        }
      },
      messages: {
        role_name: {
          remote: "Nama sudah digunakan"
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