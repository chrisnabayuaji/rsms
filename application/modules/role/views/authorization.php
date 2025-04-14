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
            <form id="form" action="<?= site_url() . '/' . $menu['controller'] . '/authorization_save/' . $id ?>" method="post" autocomplete="off">
              <div class="card-body">
                <div class="flash-error" data-flasherror="<?= $this->session->flashdata('flash_error') ?>"></div>
                <input type="hidden" class="form-control form-control-sm" name="role_id" id="role_id" value="<?= @$main['role_id'] ?>" required>
                <?php if ($id != null) : ?>
                  <input type="hidden" class="form-control form-control-sm" name="old" id="old" value="<?= @$main['role_id'] ?>" required>
                <?php endif; ?>
                <div class="form-group row">
                  <label for="menu" class="col-sm-2 col-form-label text-right">Nama Role <span class="text-danger">*</span></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" name="role_name" id="role_name" value="<?= @$main['role_name'] ?>" required readonly>
                  </div>
                </div>
                <div id="icon-container" class="form-group row">
                  <label for="icon" class="col-sm-2 col-form-label text-right">Deskripsi <span class="text-danger">*</span></label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-sm" name="description" id="description" value="<?= @$main['description'] ?>" required readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="url" class="col-sm-2 col-form-label text-right">Menu</label>
                  <div class="col-sm-10">
                    <table class="table table-striped table-bordered table-sm">
                      <thead>
                        <tr>
                          <th class="text-center" width="100">Kode</th>
                          <th class="text-center" width="100">Induk</th>
                          <th class="text-center">Nama Menu</th>
                          <th class="text-center" width="70">Read</th>
                          <th class="text-center" width="70">Create</th>
                          <th class="text-center" width="70">Update</th>
                          <th class="text-center" width="70">Delete</th>
                          <th class="text-center" width="70">Report</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($menu_list as $r) : ?>
                          <tr>
                            <td><?= $r['menu_id'] ?></td>
                            <td><?= $r['parent_id'] ?></td>
                            <td><?= $r['menu_name'] ?></td>
                            <td class="text-center">
                              <?php if ($r['is_read']) : ?>
                                <div class="pretty p-icon">
                                  <input class="checkitem" id="read_<?= str_replace('.', '_', $r['menu_id']) ?>" type="checkbox" value="<?= $r['menu_id'] ?>" data-menuid="<?= str_replace('.', '_', $r['menu_id']) ?>" name="_read[]" <?= ($r['_read'] == 1) ? 'checked' : '' ?> onclick="check_all(this);" />
                                  <div class="state">
                                    <i class="icon fas fa-check"></i><label></label>
                                  </div>
                                </div>
                              <?php endif; ?>
                            </td>
                            <td class="text-center">
                              <?php if ($r['is_create']) : ?>
                                <div class="pretty p-icon">
                                  <input class="checkitem" id="create_<?= str_replace('.', '_', $r['menu_id']) ?>" type="checkbox" value="<?= $r['menu_id'] ?>" data-menuid="<?= str_replace('.', '_', $r['menu_id']) ?>" name="_create[]" <?= ($r['_create'] == 1) ? 'checked' : '' ?> onclick="check_item(this)" />
                                  <div class="state">
                                    <i class="icon fas fa-check"></i><label></label>
                                  </div>
                                </div>
                              <?php endif; ?>
                            </td>
                            <td class="text-center">
                              <?php if ($r['is_update']) : ?>
                                <div class="pretty p-icon">
                                  <input class="checkitem" id="update_<?= str_replace('.', '_', $r['menu_id']) ?>" type="checkbox" value="<?= $r['menu_id'] ?>" data-menuid="<?= str_replace('.', '_', $r['menu_id']) ?>" name="_update[]" <?= ($r['_update'] == 1) ? 'checked' : '' ?> onclick="check_item(this)" />
                                  <div class="state">
                                    <i class="icon fas fa-check"></i><label></label>
                                  </div>
                                </div>
                              <?php endif; ?>
                            </td>
                            <td class="text-center">
                              <?php if ($r['is_delete']) : ?>
                                <div class="pretty p-icon">
                                  <input class="checkitem" id="delete_<?= str_replace('.', '_', $r['menu_id']) ?>" type="checkbox" value="<?= $r['menu_id'] ?>" data-menuid="<?= str_replace('.', '_', $r['menu_id']) ?>" name="_delete[]" <?= ($r['_delete'] == 1) ? 'checked' : '' ?> onclick="check_item(this)" />
                                  <div class="state">
                                    <i class="icon fas fa-check"></i><label></label>
                                  </div>
                                </div>
                              <?php endif; ?>
                            </td>
                            <td class="text-center">
                              <?php if ($r['is_report']) : ?>
                                <div class="pretty p-icon">
                                  <input class="checkitem" id="report_<?= str_replace('.', '_', $r['menu_id']) ?>" type="checkbox" value="<?= $r['menu_id'] ?>" data-menuid="<?= str_replace('.', '_', $r['menu_id']) ?>" name="_report[]" <?= ($r['_report'] == 1) ? 'checked' : '' ?> onclick="check_item(this)" />
                                  <div class="state">
                                    <i class="icon fas fa-check"></i><label></label>
                                  </div>
                                </div>
                              <?php endif; ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
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

  function check_all(obj) {
    id = $(obj).data('menuid');
    if (obj.checked) {
      $("#create_" + id).prop('checked', true);
      $("#update_" + id).prop('checked', true);
      $("#delete_" + id).prop('checked', true);
      $("#report_" + id).prop('checked', true);
    } else {
      $("#create_" + id).prop('checked', false);
      $("#update_" + id).prop('checked', false);
      $("#delete_" + id).prop('checked', false);
      $("#report_" + id).prop('checked', false);
    }
  }

  function check_item(obj) {
    id = $(obj).data('menuid');
    if (obj.checked) {
      $("#read_" + id).prop('checked', true);
    }
  }
</script>