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
            <div class="card-body">
              <div class="flash-error" data-flasherror="<?= $this->session->flashdata('flash_error') ?>"></div>
              <div class="form-group row mb-1">
                <label for="logo" class="col-sm-2 col-form-label text-right">Navbar Variants</label>
                <div class="col-sm-5">
                  <div class="d-flex flex-wrap mb-3">
                    <button type="button" onclick="save('navbar_variant','navbar-dark navbar-primary')" class="btn bg-primary elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['navbar_variant'] == "navbar-dark navbar-primary") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('navbar_variant','navbar-dark navbar-secondary')" class="btn bg-secondary elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['navbar_variant'] == "navbar-dark navbar-secondary") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('navbar_variant','navbar-dark navbar-info')" class="btn bg-info elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['navbar_variant'] == "navbar-dark navbar-info") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('navbar_variant','navbar-dark navbar-success')" class="btn bg-success elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['navbar_variant'] == "navbar-dark navbar-success") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('navbar_variant','navbar-dark navbar-danger')" class="btn bg-danger elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['navbar_variant'] == "navbar-dark navbar-danger") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('navbar_variant','navbar-dark navbar-indigo')" class="btn bg-indigo elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['navbar_variant'] == "navbar-dark navbar-indigo") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('navbar_variant','navbar-dark navbar-purple')" class="btn bg-purple elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['navbar_variant'] == "navbar-dark navbar-purple") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('navbar_variant','navbar-dark navbar-pink')" class="btn bg-pink elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['navbar_variant'] == "navbar-dark navbar-pink") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('navbar_variant','navbar-dark navbar-teal')" class="btn bg-teal elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['navbar_variant'] == "navbar-dark navbar-teal") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('navbar_variant','navbar-dark navbar-cyan')" class="btn bg-cyan elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['navbar_variant'] == "navbar-dark navbar-cyan") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('navbar_variant','navbar-dark')" class="btn bg-dark elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['navbar_variant'] == "navbar-dark") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('navbar_variant','navbar-dark navbar-gray-dark')" class="btn bg-gray-dark elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['navbar_variant'] == "navbar-dark navbar-gray-dark") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('navbar_variant','navbar-dark navbar-gray')" class="btn bg-gray elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['navbar_variant'] == "navbar-dark navbar-gray") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('navbar_variant','navbar-light')" class="btn bg-light elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['navbar_variant'] == "navbar-light") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('navbar_variant','navbar-light navbar-warning')" class="btn bg-warning elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['navbar_variant'] == "navbar-light navbar-warning") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('navbar_variant','navbar-light navbar-white')" class="btn bg-white elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['navbar_variant'] == "navbar-light navbar-white") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('navbar_variant','navbar-light navbar-orange')" class="btn bg-orange elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['navbar_variant'] == "navbar-light navbar-orange") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                  </div>
                </div>
              </div>
              <div class="form-group row mb-1">
                <label for="logo" class="col-sm-2 col-form-label text-right">Brand Logo Variants</label>
                <div class="col-sm-5">
                  <div class="d-flex flex-wrap mb-3">
                    <button type="button" onclick="save('brand_logo_variant','navbar-primary')" class="btn bg-primary elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['brand_logo_variant'] == "navbar-primary") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('brand_logo_variant','navbar-secondary')" class="btn bg-secondary elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['brand_logo_variant'] == "navbar-secondary") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('brand_logo_variant','navbar-info')" class="btn bg-info elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['brand_logo_variant'] == "navbar-info") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('brand_logo_variant','navbar-success')" class="btn bg-success elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['brand_logo_variant'] == "navbar-success") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('brand_logo_variant','navbar-danger')" class="btn bg-danger elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['brand_logo_variant'] == "navbar-danger") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('brand_logo_variant','navbar-indigo')" class="btn bg-indigo elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['brand_logo_variant'] == "navbar-indigo") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('brand_logo_variant','navbar-purple')" class="btn bg-purple elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['brand_logo_variant'] == "navbar-purple") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('brand_logo_variant','navbar-pink')" class="btn bg-pink elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['brand_logo_variant'] == "navbar-pink") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('brand_logo_variant','navbar-teal')" class="btn bg-teal elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['brand_logo_variant'] == "navbar-teal") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('brand_logo_variant','navbar-cyan')" class="btn bg-cyan elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['brand_logo_variant'] == "navbar-cyan") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('brand_logo_variant','navbar-dark')" class="btn bg-dark elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['brand_logo_variant'] == "navbar-dark") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('brand_logo_variant','navbar-gray-dark')" class="btn bg-gray-dark elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['brand_logo_variant'] == "navbar-gray-dark") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('brand_logo_variant','navbar-gray')" class="btn bg-gray elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['brand_logo_variant'] == "navbar-gray") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('brand_logo_variant','navbar-light')" class="btn bg-light elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['brand_logo_variant'] == "navbar-light") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('brand_logo_variant','navbar-warning')" class="btn bg-warning elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['brand_logo_variant'] == "navbar-warning") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('brand_logo_variant','navbar-white')" class="btn bg-white elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['brand_logo_variant'] == "navbar-white") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('brand_logo_variant','navbar-orange')" class="btn bg-orange elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['brand_logo_variant'] == "navbar-orange") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                  </div>
                </div>
              </div>
              <div class="form-group row mb-1">
                <label for="logo" class="col-sm-2 col-form-label text-right">Sidebar Variants</label>
                <div class="col-sm-5">
                  <div class="d-flex flex-wrap mb-3">
                    <button type="button" onclick="save('sidebar_variant','sidebar-dark-')" class="btn bg-dark elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['sidebar_variant'] == "sidebar-dark-") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    <button type="button" onclick="save('sidebar_variant','sidebar-light-')" class="btn bg-light elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['sidebar_variant'] == "sidebar-light-") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                  </div>
                </div>
              </div>
              <div class="form-group row mb-1">
                <label for="logo" class="col-sm-2 col-form-label text-right">Sidebar Accents</label>
                <div class="col-sm-5">
                  <div class="d-flex flex-wrap mb-3">
                    <div class="d-flex flex-wrap mb-3">
                      <button type="button" onclick="save('sidebar_accent','primary')" class="btn bg-primary elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['sidebar_accent'] == "primary") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                      <button type="button" onclick="save('sidebar_accent','warning')" class="btn bg-warning elevation-4" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 1; cursor: pointer;"><?php if (@$main['sidebar_accent'] == "warning") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                      <button type="button" onclick="save('sidebar_accent','info')" class="btn bg-info elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['sidebar_accent'] == "info") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                      <button type="button" onclick="save('sidebar_accent','danger')" class="btn bg-danger elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['sidebar_accent'] == "danger") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                      <button type="button" onclick="save('sidebar_accent','success')" class="btn bg-success elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['sidebar_accent'] == "success") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                      <button type="button" onclick="save('sidebar_accent','indigo')" class="btn bg-indigo elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['sidebar_accent'] == "indigo") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                      <button type="button" onclick="save('sidebar_accent','navy')" class="btn bg-navy elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['sidebar_accent'] == "navy") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                      <button type="button" onclick="save('sidebar_accent','purple')" class="btn bg-purple elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['sidebar_accent'] == "purple") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                      <button type="button" onclick="save('sidebar_accent','fuchsia')" class="btn bg-fuchsia elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['sidebar_accent'] == "fuchsia") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                      <button type="button" onclick="save('sidebar_accent','pink')" class="btn bg-pink elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['sidebar_accent'] == "pink") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                      <button type="button" onclick="save('sidebar_accent','maroon')" class="btn bg-maroon elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['sidebar_accent'] == "maroon") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                      <button type="button" onclick="save('sidebar_accent','orange')" class="btn bg-orange elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['sidebar_accent'] == "orange") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                      <button type="button" onclick="save('sidebar_accent','lime')" class="btn bg-lime elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['sidebar_accent'] == "lime") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                      <button type="button" onclick="save('sidebar_accent','teal')" class="btn bg-teal elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['sidebar_accent'] == "teal") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                      <button type="button" onclick="save('sidebar_accent','olive')" class="btn bg-olive elevation-2" style="width: 50px; height: 35px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"><?php if (@$main['sidebar_accent'] == "olive") : ?><i class="check fas fa-check"></i><?php endif; ?></button>
                    </div>
                  </div>
                </div>
              </div>
              <div id="access-container" class="form-group row mb-1">
                <label for="url" class="col-sm-2 col-form-label text-right">Element</label>
                <div class="col-sm-3">
                  <div class="pretty p-icon">
                    <input class="icheckbox" onclick="element(this, 'navbar_border')" type="checkbox" name="navbar_border" id="navbar_border" value="1" <?php if (@$main['navbar_border'] == 1) {
                                                                                                                                                          echo 'checked';
                                                                                                                                                        } ?>>
                    <div class="state">
                      <i class="icon fas fa-check"></i><label> No Navbar border</label>
                    </div>
                  </div><br>
                  <div class="pretty p-icon">
                    <input class="icheckbox" onclick="element(this, 'body_small_text')" type="checkbox" name="body_small_text" id="body_small_text" value="1" <?php if (@$main['body_small_text'] == 1) {
                                                                                                                                                                echo 'checked';
                                                                                                                                                              } ?>>
                    <div class="state">
                      <i class="icon fas fa-check"></i><label> Body small text.</label>
                    </div>
                  </div><br>
                  <div class="pretty p-icon">
                    <input class="icheckbox" onclick="element(this, 'navbar_small_text')" type="checkbox" name="navbar_small_text" id="navbar_small_text" value="1" <?php if (@$main['navbar_small_text'] == 1) {
                                                                                                                                                                      echo 'checked';
                                                                                                                                                                    } ?>>
                    <div class="state">
                      <i class="icon fas fa-check"></i><label> Navbar small text.</label>
                    </div>
                  </div><br>
                  <div class="pretty p-icon">
                    <input class="icheckbox" onclick="element(this, 'sidebarnav_small_text')" type="checkbox" name="sidebarnav_small_text" id="sidebarnav_small_text" value="1" <?php if (@$main['sidebarnav_small_text'] == 1) {
                                                                                                                                                                                  echo 'checked';
                                                                                                                                                                                } ?>>
                    <div class="state">
                      <i class="icon fas fa-check"></i><label> Sidebar nav small text.</label>
                    </div>
                  </div><br>
                  <div class="pretty p-icon">
                    <input class="icheckbox" onclick="element(this, 'footer_small_text')" type="checkbox" name="footer_small_text" id="footer_small_text" value="1" <?php if (@$main['footer_small_text'] == 1) {
                                                                                                                                                                      echo 'checked';
                                                                                                                                                                    } ?>>
                    <div class="state">
                      <i class="icon fas fa-check"></i><label> Footer small text.</label>
                    </div>
                  </div><br>
                  <div class="pretty p-icon">
                    <input class="icheckbox" onclick="element(this, 'flat_sidebar')" type="checkbox" name="flat_sidebar" id="flat_sidebar" value="1" <?php if (@$main['flat_sidebar'] == 1) {
                                                                                                                                                        echo 'checked';
                                                                                                                                                      } ?>>
                    <div class="state">
                      <i class="icon fas fa-check"></i><label> Sidebar nav flat style.</label>
                    </div>
                  </div><br>
                  <div class="pretty p-icon">
                    <input class="icheckbox" onclick="element(this, 'legacy_sidebar')" type="checkbox" name="legacy_sidebar" id="legacy_sidebar" value="1" <?php if (@$main['legacy_sidebar'] == 1) {
                                                                                                                                                              echo 'checked';
                                                                                                                                                            } ?>>
                    <div class="state">
                      <i class="icon fas fa-check"></i><label> Legacy nav flat style.</label>
                    </div>
                  </div><br>
                  <div class="pretty p-icon">
                    <input class="icheckbox" onclick="element(this, 'compact_sidebar')" type="checkbox" name="compact_sidebar" id="compact_sidebar" value="1" <?php if (@$main['compact_sidebar'] == 1) {
                                                                                                                                                                echo 'checked';
                                                                                                                                                              } ?>>
                    <div class="state">
                      <i class="icon fas fa-check"></i><label> Sidebar nav compact.</label>
                    </div>
                  </div><br>
                  <div class="pretty p-icon">
                    <input class="icheckbox" onclick="element(this, 'nav_child_indent')" type="checkbox" name="nav_child_indent" id="nav_child_indent" value="1" <?php if (@$main['nav_child_indent'] == 1) {
                                                                                                                                                                    echo 'checked';
                                                                                                                                                                  } ?>>
                    <div class="state">
                      <i class="icon fas fa-check"></i><label> Sidebar nav child indent.</label>
                    </div>
                  </div><br>
                  <div class="pretty p-icon">
                    <input class="icheckbox" onclick="element(this, 'layout_fixed')" type="checkbox" name="layout_fixed" id="layout_fixed" value="1" <?php if (@$main['layout_fixed'] == 1) {
                                                                                                                                                        echo 'checked';
                                                                                                                                                      } ?>>
                    <div class="state">
                      <i class="icon fas fa-check"></i><label> Fixed Sidebar.</label>
                    </div>
                  </div><br>
                  <div class="pretty p-icon">
                    <input class="icheckbox" onclick="element(this, 'layout_navbar_fixed')" type="checkbox" name="layout_navbar_fixed" id="layout_navbar_fixed" value="1" <?php if (@$main['layout_navbar_fixed'] == 1) {
                                                                                                                                                                            echo 'checked';
                                                                                                                                                                          } ?>>
                    <div class="state">
                      <i class="icon fas fa-check"></i><label> Fixed Navbar (Top).</label>
                    </div>
                  </div><br>
                  <div class="pretty p-icon">
                    <input class="icheckbox" onclick="element(this, 'layout_footer_fixed')" type="checkbox" name="layout_footer_fixed" id="layout_footer_fixed" value="1" <?php if (@$main['layout_footer_fixed'] == 1) {
                                                                                                                                                                            echo 'checked';
                                                                                                                                                                          } ?>>
                    <div class="state">
                      <i class="icon fas fa-check"></i><label> Fixed Footer (Bottom).</label>
                    </div>
                  </div><br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div><!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
  $(document).ready(function() {

  });

  function save(type, val) {
    window.location.href = "<?= site_url() . '/' . $menu['controller'] . '/save/' ?>" + type + "/" + val;
  }

  function element(obj, val) {
    if (obj.checked) {
      window.location.href = "<?= site_url() . '/' . $menu['controller'] . '/save/' ?>" + val + "/" + 1;
    } else {
      window.location.href = "<?= site_url() . '/' . $menu['controller'] . '/save/' ?>" + val + "/" + 0;
    }
  }
</script>