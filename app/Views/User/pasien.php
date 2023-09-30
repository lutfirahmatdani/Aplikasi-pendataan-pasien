<?php $this->extend('layouts/user'); ?>
<?php $this->section('content'); ?>

<?php
$session = session();
$pesan = $session->getFlashdata('pesan');
?>

<!-- form tambah data pasien -->
<section id="hero">
    <div class="card bg-glass" data-aos="flip-down">
        <div class="card-body px-4 py-5 px-md-5">
            <form method="post" action="/pasien/save">
                <?= csrf_field(); ?>

                <div>
                    <?php if ($pesan) { ?>
                        <p style="color:green"><?php echo $pesan ?></p>
                    <?php } ?>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="nama_pasien">Nama Pasien :</label>
                    <input type="text" name="nama_pasien" id="nama_pasien" class="form-control" placeholder="Nama Lengkap Anda" value="<?= old('nama_pasien'); ?>" required />
                    <?= $validation->getError('nama-pasien'); ?>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="jenis_kelamin">Jenis Kelamin :</label>
                    <select name="jenis_kelamin" id="jenis_kelamin">
                        <option value="Laki-laki" id="jenis_kelamin">Laki-laki</option>
                        <option value="Perempuan" id="jenis_kelamin">Perempuan</option>
                    </select>
                    <?= $validation->getError('jenis_kelamin'); ?>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="penyakit">Penyakit :</label>
                    <input type="text" name="penyakit" id="panyakit" class="form-control" placeholder="Nama Penyakit Anda" value="<?= old('penyakit'); ?>" required />
                    <?= $validation->getError('penyakit'); ?>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="ruang">Ruang :</label>
                    <input type="text" name="ruang" id="ruang" class="form-control" placeholder="Ruang" value="<?= old('ruang'); ?>" required />
                    <?= $validation->getError('ruang'); ?>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block btn-lg mb-4">
                    Tambah Data
                </button>
            </form>
        </div>
    </div>
</section>


<?php $this->endSection(); ?>