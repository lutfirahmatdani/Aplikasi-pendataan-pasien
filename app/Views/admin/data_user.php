<?= $this->extend('layouts/sbadmin') ?>
<?= $this->section('content') ?>

<?php
$session = \Config\Services::session();
$pesan = $session->getFlashdata('pesan');
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data User</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data User
                </div>

                <?php if ($pesan) { ?>
                    <h5 style="color:green"><?php echo $pesan ?><h5>
                        <?php } ?>

                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Salt</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Salt</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($user as $s) : ?>
                                        <tr>
                                            <td>
                                                <?= $i++; ?>
                                            </td>
                                            <td>
                                                <?= $s['username']; ?>
                                            </td>
                                            <td>
                                                <?= $s['password']; ?>
                                            </td>
                                            <td>
                                                <?= $s['salt']; ?>
                                            </td>
                                            <td>
                                                <?= $s['role']; ?>
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-primary">Edit</a>
                                                <form action="/user/<?= $s['id']; ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')">Delete</button>
                                                </form>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal">Detail</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
            </div>
        </div>
    </main>

    <?= $this->endSection() ?>