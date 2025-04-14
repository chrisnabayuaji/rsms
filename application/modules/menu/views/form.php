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
            <form id="form" action="<?= site_url() . '/' . $menu['controller'] . '/save/' . $id ?>" method="post" autocomplete="off">
              <div class="card-body">
                <div class="flash-error" data-flasherror="<?= $this->session->flashdata('flash_error') ?>"></div>
                <div class="form-group row">
                  <label for="type" class="col-sm-2 col-form-label text-right">Tipe</label>
                  <div class="col-sm-2">
                    <select class="form-control form-control-sm select2-hidden" name="type" id="type">
                      <option <?= (@$main['type'] == 1) ? 'selected' : '' ?> value="1">Separator</option>
                      <option <?= (@$main['type'] == 2) ? 'selected' : '' ?> value="2">Induk</option>
                      <option <?= (@$main['type'] == 3) ? 'selected' : '' ?> value="3">Menu</option>
                    </select>
                  </div>
                </div>
                <div id="parent-container" class="form-group row">
                  <label for="parent_id" class="col-sm-2 col-form-label text-right">Induk</label>
                  <div class="col-sm-4">
                    <select class="form-control form-control-sm select2" name="parent_id" id="parent_id">
                      <option value="">---</option>
                      <?php foreach ($all as $r) : ?>
                        <option value="<?= $r['menu_id'] ?>" <?= (@$main['parent_id'] == $r['menu_id']) ? 'selected' : '' ?>><?= $r['menu_id'] ?> - <?= $r['menu_name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="id" class="col-sm-2 col-form-label text-right">Kode <span class="text-danger">*</span></label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" name="menu_id" id="menu_id" value="<?= @$main['menu_id'] ?>" required>
                    <?php if ($id != null) : ?>
                      <input type="hidden" class="form-control form-control-sm" name="old" id="old" value="<?= @$main['menu_id'] ?>" required>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="menu" class="col-sm-2 col-form-label text-right">Menu <span class="text-danger">*</span></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" name="menu_name" id="menu_name" value="<?= @$main['menu_name'] ?>" required>
                  </div>
                </div>
                <div id="icon-container" class="form-group row">
                  <label for="icon" class="col-sm-2 col-form-label text-right">Ikon <span class="text-danger">*</span></label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" name="icon" id="icon" value="<?= @$main['icon'] ?>" required>
                  </div>
                </div>
                <div id="controller-container" class="form-group row">
                  <label for="controller" class="col-sm-2 col-form-label text-right">Controller <span class="text-danger">*</span></label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control form-control-sm" name="controller" id="controller" value="<?= @$main['controller'] ?>" required>
                  </div>
                </div>
                <div id="url-container" class="form-group row">
                  <label for="url" class="col-sm-2 col-form-label text-right">Url <span class="text-danger">*</span></label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control form-control-sm" name="url" id="url" value="<?= @$main['url'] ?>" required>
                  </div>
                </div>
                <div id="access-container" class="form-group row">
                  <label for="url" class="col-sm-2 col-form-label text-right">Akses <span class="text-danger">*</span></label>
                  <div class="col-sm-3">
                    <div class="pretty p-icon">
                      <input class="icheckbox" type="checkbox" name="is_read" id="is_read" value="1" <?= (@$main['is_read'] == 1) ? 'checked' : '' ?>>
                      <div class="state">
                        <i class="icon fas fa-check"></i><label> Read</label>
                      </div>
                    </div><br>
                    <div class="pretty p-icon">
                      <input class="icheckbox" type="checkbox" name="is_create" id="is_create" value="1" <?= (@$main['is_create'] == 1) ? 'checked' : '' ?>>
                      <div class="state">
                        <i class="icon fas fa-check"></i><label> Create</label>
                      </div>
                    </div><br>
                    <div class="pretty p-icon">
                      <input class="icheckbox" type="checkbox" name="is_update" id="is_update" value="1" <?= (@$main['is_update'] == 1) ? 'checked' : '' ?>>
                      <div class="state">
                        <i class="icon fas fa-check"></i><label> Update</label>
                      </div>
                    </div><br>
                    <div class="pretty p-icon">
                      <input class="icheckbox" type="checkbox" name="is_delete" id="is_delete" value="1" <?= (@$main['is_delete'] == 1) ? 'checked' : '' ?>>
                      <div class="state">
                        <i class="icon fas fa-check"></i><label> Delete</label>
                      </div>
                    </div><br>
                    <div class="pretty p-icon">
                      <input class="icheckbox" type="checkbox" name="is_report" id="is_report" value="1" <?= (@$main['is_report'] == 1) ? 'checked' : '' ?>>
                      <div class="state">
                        <i class="icon fas fa-check"></i><label> Report</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="url" class="col-sm-2 col-form-label text-right">Aktif</label>
                  <div class="col-sm-3">
                    <div class="pretty p-icon">
                      <input class="icheckbox" type="checkbox" name="is_active" id="is_active" value="1" <?php if (@$main) {
                                                                                                            echo (@$main['is_active'] == 1) ? 'checked' : '';
                                                                                                          } else {
                                                                                                            echo 'checked';
                                                                                                          } ?>>
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
        menu_id: {
          remote: {
            type: 'post',
            url: "<?= site_url() . '/' . $menu['controller'] . '/ajax/check_id/' . $id ?>",
            data: {
              'menu_id': function() {
                return $('#menu_id').val();
              }
            },
            dataType: 'json'
          }
        }
      },
      messages: {
        menu_id: {
          remote: "Kode sudah digunakan"
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

    //type onchange
    $('#type').on('select2:select', function(e) {
      get_type($(this).val());
    });

    function get_type(val) {
      if (val == 3) {
        $("#access-container").show();
        $("#parent-container").show();
        $("#controller-container").show();
        $("#url-container").show();
        $("#icon-container").show();
      } else {
        $("#access-container").hide();

        $("#parent").val('').change();
        $("#parent-container").hide();

        $("#controller").val('#');
        $("#controller-container").hide();

        $("#url").val('#');
        $("#url-container").hide();

        if (val == 1) {
          $("#icon").val('#');
          $("#icon-container").hide();
        } else {
          $("#icon-container").show();
        }

        $("#parent_id").val('').trigger('change');
      }
    }

    <?php if ($id == null) : ?>
      get_type(1);
    <?php else : ?>
      get_type(<?= @$main['type'] ?>);
      $("#type").val(<?= @$main['type'] ?>).trigger('change');
    <?php endif; ?>
  })
</script>