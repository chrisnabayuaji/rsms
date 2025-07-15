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
          <div class="card card-primary card-outline">
            <div class="card-body p-2">
              <div class="row">
                <div class="col-sm-1">
                  <div class="text-center">
                    <img class="img img-fluid img-circle" src="<?= base_url() . '/images/users/no-photo.png' ?>" alt="" width="80">
                  </div>
                </div>
                <div class="col-11">
                  <div class="row">
                    <div class="col-4">
                      <table class="table table-striped table-sm mb-0">
                        <tbody>
                          <tr>
                            <td width="120">No Rekam Medis</td>
                            <td width="10">:</td>
                            <td><?= $main['rm_no'] ?></td>
                          </tr>
                          <tr>
                            <td>Nama Pasien</td>
                            <td>:</td>
                            <td><?= $main['pasien_name'] ?></td>
                          </tr>
                          <tr>
                            <td>Umur</td>
                            <td>:</td>
                            <td><?= $main['umur_thn'] ?> Th <?= $main['umur_bln'] ?> Bl <?= $main['umur_hr'] ?> Hr</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-4">
                      <table class="table table-striped table-sm mb-0">
                        <tbody>
                          <tr>
                            <td width="120">Bangsal</td>
                            <td width="10">:</td>
                            <td><?= $main['bangsal_name'] ?></td>
                          </tr>
                          <tr>
                            <td>No. Kamar</td>
                            <td>:</td>
                            <td><?= $main['kamar_no'] ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-4">
                      <table class="table table-striped table-sm mb-0">
                        <tbody>
                          <tr>
                            <td width="120">DPJP</td>
                            <td width="10">:</td>
                            <td><?= $main['dpjp_name'] ?></td>
                          </tr>
                          <tr>
                            <td>Residen</td>
                            <td>:</td>
                            <td><?= $main['residen_name'] ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body p-2">
              <?php $cppt_count = 100; ?>
              <div class="freeze-table mt-2">
                <table class="table table-striped table-bordered table-sm" style="width:<?= 150 + (150 * $cppt_count) ?>px">
                  <thead>
                    <tr class="bg-info">
                      <th class="align-middle" width="150">Tanggal</th>
                      <?php for ($i = 0; $i < 100; $i++): ?>
                        <th class="text-center"><?= date('d-m-Y H:i:s', strtotime("+$i days")) ?></th>
                      <?php endfor; ?>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="align-top"><b>PPA</b></td>
                    </tr>
                    <tr>
                      <td class="align-top"><b>Subjective</b></td>
                    </tr>
                    <tr>
                      <td class="align-top"><b>Objective</b></td>
                    </tr>
                    <tr>
                      <td class="align-top"><b>Assessment</b></td>
                    </tr>
                    <tr>
                      <td class="align-top"><b>Plan</b></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div><!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
  $(function() {
    $('.freeze-table').freezeTable({
      'columnNum': 1,
      'scrollable': true,
    });
  });
</script>