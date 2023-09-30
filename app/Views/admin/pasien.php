<?php $this->extend('layouts/sbadmin'); ?>
<?php $this->section('content'); ?>

<?php
$pesan = session()->getFlashdata('pesan');
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Pasien</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Data Pasien</li>
            </ol>
            <!-- button tambah data -->
            <div class="row mb-3">
                <div class="col-sm-10">
                    <a href="/admin/tambah/pasien" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pasien</th>
                                <th>jenis Kelamin</th>
                                <th>Penyakit</th>
                                <th>Ruang</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Pasien</th>
                                <th>jenis Kelamin</th>
                                <th>Penyakit</th>
                                <th>Ruang</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pasien as $p) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td>
                                        <?= $p['nama_pasien']; ?>
                                    </td>
                                    <td><?= $p['jenis_kelamin']; ?></td>
                                    <td><?= $p['penyakit']; ?></td>
                                    <td><?= $p['ruang']; ?></td>
                                    <td>
                                        <a href="/pasien/edit/<?= $p['id']; ?>" class="btn btn-primary" >Edit</a>
                                        <form action="/pasien/<?= $p['id']; ?>" method="post" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')">Delete</button>
                                        </form>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#Modal<?= $p['id']; ?>">Detail</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php if ($pesan) { ?>
                                <h5 style="color:green"><?php echo $pesan ?><h5>
                                    <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php foreach ($pasien as $k) : ?>
            <div class="modal fade" id="Modal<?= $p['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6>Id : <?= $p['id']; ?></h6>
                            <h6>Nama Pasien : <?= $p['nama_pasien']; ?></h6>
                            <h6>Jenis Kelamin : <?= $p['jenis_kelamin']; ?></h6>
                            <h6>Penyakit : <?= $p['penyakit']; ?></h6>
                            <h6>Ruang : <?= $p['ruang']; ?></h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </main>

    <?php $this->endSection(); ?>