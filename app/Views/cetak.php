<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="col-2">
                <a href="<?= base_url('Pegawai/tambah') ?>" class="btn btn-block bg-gradient-primary btn-sm">Tambah</a>
                <a href="#" class="btn btn-block bg-gradient-info btn-sm">Cetak</a>
                </div>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                
              

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>No Telp</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                  <?php $no=1;
                    foreach($pegawai as $p){
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $p->nama; ?></td>
                        <td><?= $p->jenis_kelamin; ?></td>
                        <td><?= $p->no_telp; ?></td>
                        <td><?= $p->email; ?></td>
                        <td><?= $p->alamat; ?></td>
                        <td>
                            <a href="<?= base_url("Pegawai/ubah/$p->id_pegawai") ?>" class="btn btn-block btn-success">Ubah</a>
                            <a href="<?= base_url("Pegawai/hapus/$p->id_pegawai") ?>" class="btn btn-block btn-danger" onclick="return confirm('Yakin Mau Dihapus Datanya ???')">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>