<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Validation</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Validation</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- jquery validation -->
                            <div class="card">
                                <div class="card-header">
                                    <div class="col-2"><a href="<?= base_url('Pegawai/index') ?>" class="btn btn-block bg-gradient-danger btn-sm">Kembali</a></div>
                                </div>

                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <h4>Periksa Entrian Form</h4>
                                        </hr />
                                        <?php echo session()->getFlashdata('error'); ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif; ?>
                                
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="post" action="<?= base_url('Pegawai/prosestambah') ?>">
                                <!-- <form id="quickForm" > -->
                                    <!-- <?= csrf_field(); ?> -->
                                    <div class="card-body"> 
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama'); ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                                <option value=""></option>
                                                <option value="pria">Pria</option>
                                                <option value="wanita">Wanita</option>
                                            </select>
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="no_telp">No Telp</label>
                                            <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= old('no_telp') ?>" />
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" value="<?= old('email') ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea class="form-control" name="alamat" id="alamat"><?= old('alamat') ?></textarea>
                                        </div>
                                        
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-6">

                        </div>
                        <!--/.col (right) -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>