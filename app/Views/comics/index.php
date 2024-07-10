<!-- memanggil file template.php yang berisi header dan footer -->
<?= $this->extend('layout/template');; ?>

<?= $this->section('content'); ?> <!-- menandakan section 'content' dimulai -->
<div class="container">
    <div class="row">
        <div class="col">
            <?php if (session()->getFlashdata('message')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('message'); ?>
                </div>
            <?php endif; ?>
            <h1 class="mt-2">Daftar Komik</h1>
            <a href="/comics/create" class="btn btn-sm btn-primary">Tambah Data Komik</a>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?> <!-- sebagai nomor -->
                    <?php foreach ($comic as $cmc) : ?> <!-- menampilakan data dari controller $comic -->
                        <tr>
                            <!-- menampilkan data tiap kolom dengan menggunakan array asosiatif -->
                            <th scope="row"><?= $no++; ?></th>
                            <td><img src="/img/<?= $cmc['sampul']; ?>" alt="" srcset="" class="sampul"></td>
                            <td><?= $cmc['judul']; ?></td>
                            <td><a href="/comics/<?= $cmc['slug']; ?>" class="btn btn-sm btn-primary">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?> <!-- menandakan section 'content' diakhiri -->