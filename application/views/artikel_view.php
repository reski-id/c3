<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/bootstrap.min.css">

    <title>Data Murid</title>
</head>

<body>
    <!-- As a heading -->
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Artikel</span>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12">
                <h3>Data Artikel</h3>
                <?= $this->session->flashdata('success'); ?>
                <a href="<?= base_url('artikel/tambah/'); ?>" class="btn btn-success mb-2">Tambah Data</a>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <?php $no = 1; ?>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Isi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($artikels as $artikel) : ?>
                                <tr>
                                    <th scope="row"><?= $no++; ?></th>
                                    <td><?= $artikel['judul']; ?></td>
                                    <td><?= $artikel['penulis']; ?></td>
                                    <td><?= $artikel['isi']; ?></td>
                                    <td><a href="<?= base_url('artikel/hapus/'); ?><?= $artikel['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah kamu ingin menghapus data ini?');">Hapus</a>
                                    </td>
                                    <td><a href="<?= base_url('artikel/ubah/'); ?><?= $artikel['id']; ?>" class="badge badge-warning">Ubah</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="<?= base_url('assets') ?>/js/bootstrap.min.js"></script>
</body>

</html>