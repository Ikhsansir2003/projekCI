<?= $this->extend('layout/template')?>
  
  <?= $this->section('konten')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Mahasiawa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master</a></li>
              <li class="breadcrumb-item active">Mahasiswa</li>
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
                <h3 class="card-title"></h3>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
                    <i class="fa fa-plus"></i>Tambah</button>
                </h3>  
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>


              <div class="card-body">
                <?php if ((session()->getFlashdata('pesan') !==NULL)) {
                  echo session()->getFlashdata('pesan');
                } ?>
                <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th width=%5%>NO</th>
                    <th width=%10%>NIM</th>
                    <th>NAMA</th>
                    <th>ALAMAT</th>
                    <th>GENDER</th>
                    <th width=%10%>AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $nom = 1;
                  foreach ($mahasiswa as $mhs){?>
                    <tr>
                      <td><?=$nom++?></td> 
                      <td><?=$mhs['nim']?></td> 
                      <td><?=$mhs['nama']?></td> 
                      <td><?=$mhs['alamat']?></td>
                      <td><?=$mhs['jenkel']?></td> 
                      <td>
                      <button type="button" class="btn btn-sm btn-warning edit" data-toggle="modal" data-target="#edit"
                        data-nim="<?= $mhs['nim'] ?>" data-nama="<?= $mhs['nama'] ?>" data-alamat="<?= $mhs['alamat'] ?>" data-jenkel="<?= $mhs['jenkel'] ?>">
                      <i class="fa fa-edit"></i>
                      </button>

                            <button type="button" class="btn btn-sm btn-danger hapus"data-toggle="modal" data-target="#hapus">
                            <i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                  <?php } 
                  ?>
                  </tbody>
                  </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                Footer
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="tambah">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">INPUT DATA MAHASISWA</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form tambah data mahasiswa -->
                <form method="post" action="<?php echo site_url('mahasiswa/create'); ?>">
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM">                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat">
                    </div>
                    <div class="form-group">
                        <label for="jenis-kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenkel">
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="prodi">Program Studi</label>
                        <select class="form-control" name="kode_prodi" required>
                            <option value="">Pilih Program Studi</option>
                            <?php foreach ($prodi as $prd) { ?>
                                <option value="<?php echo $prd['id_jurusan']; ?>"><?php echo $prd['nama_prodi']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


  

<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">EDIT DATA MAHASISWA</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo site_url('mahasiswa/update'); ?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Kelamin</label>
                        <select class="form-control" id="jenkel" name="jk">
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Program Studi</label>
                        <select class="form-control" id="prodi" name="prodi" required>
                            <option value="">Pilih Program Studi</option>
                            <?php foreach ($prodi as $prd) { ?>
                                <option value="<?php echo $prd['id_jurusan']; ?>"><?php echo $prd['nama_prodi']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Update</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



  <div class="modal fade" id="hapus">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">HAPUS DATA MAHASISWA</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?= base_url('mahasiswa/hapus') ?>" method="post">
            <div class="modal-body">
            <div class="form-group">
                    <label for="nim"><code>Yakin hapus data Mahasiawa</code></label>
                    <input type="text" class="form-control" id="nim" name="nim">
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus</button>
            </div>
          </div>
                            </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

  <?= $this->endSection()?>

<?= $this->section("scripts") ?>
<script>
    $(document).ready(function () {
        $(document).on("click", ".edit", function () {
            var Nim = $(this).data('nim');
            var Nama = $(this).data('nama');
            var Alamat = $(this).data('alamat');
            var Jenkel = $(this).data('jenkel');

            // Mengisi nilai form di modal edit dengan data yang sesuai
            $(".modal-body #nim").val(Nim);
            $(".modal-body #nama").val(Nama);
            $(".modal-body #alamat").val(Alamat);
            $(".modal-body #jenkel").val(Jenkel);
        });
    });
</script>
<?= $this->endSection() ?>