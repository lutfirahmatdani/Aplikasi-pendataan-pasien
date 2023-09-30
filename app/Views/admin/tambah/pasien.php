<?php $this->extend('layouts/sbadmin'); ?>
<?php $this->section('content'); ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Data</h1>

            <!-- form edit data -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Tambah Data pasien
                </div>
                <div class="card-body">
                    <form action="/admin/datapasien/save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <label for="nama_pasien" class="col-sm-2 col-form-label">Nama pasien</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_pasien'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jenis_kelamin'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="penyakit" class="col-sm-2 col-form-label">Penyakit</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="penyakit" name="penyakit">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('penyakit'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="ruang" class="col-sm-2 col-form-label">Ruang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ruang" name="ruang">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ruang'); ?>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </form>
                </div>
            </div>
            <!-- end form edit data -->
    </main>

    <?php $this->endSection(); ?>