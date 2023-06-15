<?= $this->extend('layouts/admin') ?>
<?php $this->section('styles') ?>

<!-- TAMPILAN -->
<link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?> " rel="stylesheet">
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">


    <!-- HEAD -->
    <h1 class="h3 mb-2 text-gray-800"> DAFTAR PENGUNJUNG</h1>
    <?php
        if(session()->getFlashData('success')){
        ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
        }
        ?>
    <!-- DATA -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
         DAFTAR BOOKING PENGUNJUNG
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>NO HP</th>
                            <th>DOMISILI</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pengunjung as $key => $pengunjung) : ?>
                        <tr>
                            <td><?= ++$key ?></td>
                            <td><?= $pengunjung['name'] ?></td>
                            <td><?= $pengunjung['nim'] ?></td>
                            <td><?= $pengunjung['no_hp'] ?></td>
                            <td><?= $pengunjung['prodi'] ?></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal-<?= $pengunjung['id'] ?>">
                                    Edit Data
                                </button>
                                <a href="<?= base_url('pengunjung/delete/'.$pengunjung['id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure ?')">Delete</a>
                            </td>
                        </tr>

                        

 <!-- EDIT DATA PENGUNJUNG -->
<div class="modal fade" id="editModal-<?= $pengunjung['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Pengunjung Lab. PRITA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pengunjung/edit/'.$pengunjung['id']) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama Edit</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $pengunjung['name'] ?>" placeholder="Nama Mahasiswa" required>
                    </div>
                    <div class="form-group">
                        <label for="email">NIM </label>
                        <input type="nim" name="nim" class="form-control" id="nim" value="<?= $pengunjung['nim'] ?>"  placeholder="Masukan NIM Mahasiswa" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Nomor HP</label>
                        <input type="text" name="no_hp" class="form-control" id="no_hp" value="<?= $pengunjung['no_hp'] ?>"  placeholder="Nomor HP Mahasiswa" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Prodi</label>
                        <input type="text" name="prodi" class="form-control" id="prodi" value="<?= $pengunjung['prodi'] ?>"  placeholder="Program Studi" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>
</tbody>
</table> </div></div>
</div>

<!-- MENAMBAH DATA PENGUNJUNG  -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">MASUKAN DAFTAR PENGUNJUNG</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pengunjung/create') ?>" method="post">
            <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama Lengkap" required>
                    </div>
                    <div class="form-group">
                        <label for="nim">NIK</label>
                        <input type="text" name="nim" class="form-control" id="nim" placeholder="Masukan NIK" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">DOMISILI</label>
                        <input type="text" name="prodi" class="form-control" id="prodi" placeholder="Masukan  Domisili" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">NO HP</label>
                        <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="Masukan Nomor HP" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection() ?>
<?php $this->section('scripts')?>
<!-- HALAMAN PAGE -->
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<!-- Page level custom scripts -->
<script>
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });
</script>
<?php $this->endSection()?>