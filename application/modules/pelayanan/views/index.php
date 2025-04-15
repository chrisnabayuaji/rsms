<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5 class="m-0 text-dark"><i class="<?= @$menu['icon'] ?>"></i> <?= @$menu['menu_name'] ?></h5>
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
              <h3 class="card-title">Daftar <?= $menu['menu_name'] ?></h3>
            </div>
            <div class="card-body">
              <form action="<?= site_url() . '/app/search/' . $menu['menu_id'] ?>" method="post" autocomplete="off">
                <div class="row">
                  <div class="col-md-3">
                    <?php if ($menu['_create'] == 1 || $menu['_update'] == 1) : ?>
                      <a class="btn btn-sm btn-primary" href="<?= site_url() . '/' . $menu['controller'] . '/form' ?>"><i class="fas fa-plus-circle"></i> Tambah</a>
                    <?php endif; ?>
                  </div>
                  <div class="col-md-3 offset-3">
                    <select class="form-control form-control-sm select2" name="bangsal_id" id="bangsal_id">
                      <option value="">-- Semua Bangsal --</option>
                      <?php foreach ($all_lokasi as $r) : ?>
                        <option value="<?= $r['lokasi_id'] ?>" <?= (@$cookie['search']['bangsal_id'] == $r['lokasi_id']) ? 'selected' : '' ?>><?= $r['lokasi_name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-3">

                    <div class="input-group input-group-sm">
                      <input class="form-control" type="text" name="term" value="<?= @$cookie['search']['term'] ?>" placeholder="Pencarian">
                      <span class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        <a class="btn btn-default" href="<?= site_url() . '/app/reset/' . $menu['menu_id'] ?>"><i class="fas fa-sync-alt"></i></a>
                      </span>
                    </div>
                  </div>
                </div><!-- /.row -->
              </form>
              <div class="row mb-2 mt-2">
                <div class="col-md-6">
                  <div class="input-group-prepend">
                    <span class="mr-1 pt-1">Tampilkan </span>
                    <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <?= @$cookie['per_page'] ?>
                    </button>
                    <span class="ml-1 pt-1">data.</span>
                    <div class="dropdown-menu">
                      <a class="dropdown-item <?= (@$cookie['per_page'] == 10) ? 'active' : '' ?>" href="<?= site_url() . '/app/per_page/' . $menu['menu_id'] . '/10' ?>">10</a>
                      <a class="dropdown-item <?= (@$cookie['per_page'] == 25) ? 'active' : '' ?>" href="<?= site_url() . '/app/per_page/' . $menu['menu_id'] . '/25' ?>">25</a>
                      <a class="dropdown-item <?= (@$cookie['per_page'] == 50) ? 'active' : '' ?>" href="<?= site_url() . '/app/per_page/' . $menu['menu_id'] . '/50' ?>">50</a>
                      <a class="dropdown-item <?= (@$cookie['per_page'] == 100) ? 'active' : '' ?>" href="<?= site_url() . '/app/per_page/' . $menu['menu_id'] . '/100' ?>">100</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 text-right">
                  <span class="pt-1"><?= @$pagination_info ?></span>
                </div>
              </div><!-- /.row -->
              <div class="row">
                <div class="col-md-12">
                  <div class="flash-success" data-flashsuccess="<?= $this->session->flashdata('flash_success') ?>"></div>
                  <div class="table-responsive">
                    <table class="table table-bordered table-sm table-head-fixed">
                      <thead>
                        <tr>
                          <th class="text-center" width="40">No.</th>
                          <th class="text-center" width="80">Aksi</th>
                          <th class="text-center" width="120">Bangsal</th>
                          <th class="text-center" width="60">Kamar</th>
                          <th class="text-center" width="80"><?= table_sort($menu['menu_id'], 'No RM', 'rm_no', $cookie['order']) ?></th>
                          <th class="text-center" width=""><?= table_sort($menu['menu_id'], 'Nama Pasien', 'pasien_name', $cookie['order']) ?></th>
                          <th class="text-center" width="120">Umur</th>
                          <th class="text-center" width="200">DPJP</th>
                          <th class="text-center" width="200">Residen</th>
                          <th class="text-center" width="70"><?= table_sort($menu['menu_id'], 'Status', 'is_active', $cookie['order']) ?></th>
                        </tr>
                      </thead>
                      <?php if (@$main == null) : ?>
                        <tbody>
                          <tr>
                            <td class="text-center" colspan="99"><i>Tidak ada data!</i></td>
                          </tr>
                        </tbody>
                      <?php else : ?>
                        <tbody>
                          <form id="form-multiple" action="" method="post">
                            <?php $i = 1;
                            foreach ($main as $r) : ?>
                              <tr>
                                <td class="text-center"><?= $cookie['cur_page'] + ($i++) ?></td>
                                <td class="text-center">
                                  <?php if ($menu['_update'] == 1) : ?>
                                    <a class="text-success mr-1" href="<?= site_url() . '/' . $menu['controller'] . '/detail/' . $r['pelayanan_id'] ?>"><i class="fas fa-list"></i></a>
                                  <?php endif; ?>
                                  <?php if ($menu['_update'] == 1) : ?>
                                    <a class="text-warning mr-1" href="<?= site_url() . '/' . $menu['controller'] . '/form/' . $r['pelayanan_id'] ?>"><i class="fas fa-pencil-alt"></i></a>
                                  <?php endif; ?>
                                  <?php if ($menu['_delete'] == 1) : ?>
                                    <a class="text-danger btn-delete" href="<?= site_url() . '/' . $menu['controller'] . '/delete/' . $r['pelayanan_id'] ?>"><i class="fas fa-trash-alt"></i></a>
                                  <?php endif; ?>
                                </td>
                                <td><?= $r['bangsal_name'] ?></td>
                                <td><?= $r['kamar_no'] ?></td>
                                <td><?= $r['rm_no'] ?></td>
                                <td><?= $r['pasien_name'] ?></td>
                                <td><?= $r['umur_thn'] ?> Th <?= $r['umur_bln'] ?> Bl <?= $r['umur_hr'] ?> Hr</span></td>
                                <td><?= $r['dpjp_name'] ?></td>
                                <td><?= $r['residen_name'] ?></td>
                                <td class="text-center td-status">
                                  <?php if ($menu['_update'] == 1) : ?>
                                    <?php if ($r['is_active'] == 1) : ?>
                                      <a href="<?= site_url() . '/' . $menu['controller'] . '/status/disable/' . $r['pelayanan_id'] ?>">
                                        <i class="icon-status fas fa-toggle-on text-success"></i>
                                      </a>
                                    <?php else : ?>
                                      <a href="<?= site_url() . '/' . $menu['controller'] . '/status/enable/' . $r['pelayanan_id'] ?>">
                                        <i class="icon-status fas fa-toggle-off text-gray"></i>
                                      </a>
                                    <?php endif; ?>
                                  <?php else : ?>
                                    <?php if ($r['is_active'] == 1) : ?>
                                      <i class="icon-status fas fa-toggle-on text-success"></i>
                                    <?php else : ?>
                                      <i class="icon-status fas fa-toggle-off text-gray"></i>
                                    <?php endif; ?>
                                  <?php endif; ?>
                                </td>
                              </tr>
                            <?php endforeach; ?>
                          </form>
                        </tbody>
                      <?php endif; ?>
                    </table>
                  </div>
                </div>
              </div><!-- /.row -->
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6 float-right">
                  <?php echo $this->pagination->create_links(); ?>
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