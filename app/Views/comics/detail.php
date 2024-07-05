<!-- memanggil file template.php yang berisi header dan footer -->
<?= $this->extend('layout/template');; ?>

<?= $this->section('content'); ?> <!-- menandakan section 'content' dimulai -->
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Komik</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $comic['sampul']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $comic['judul']; ?></h5>
                            <p class="card-text"><b>Penulis: </b><?= $comic['penulis']; ?></p>
                            <p class="card-text"><small class="text-muted"><b>Penerbit: </b><?= $comic['penerbit']; ?></small></p>

                            <a href="" class="btn btn-warning">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>
                            <br><br>
                            <a href="/comics" class="btn btn-lg btn-primary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?> <!-- menandakan section 'content' diakhiri -->