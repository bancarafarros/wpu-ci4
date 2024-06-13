<!-- memanggil file template.php yang merupakan header dan footer -->
<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?> <!-- menandakan section 'content' dimulai -->
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Contact Us</h2>

            <?php foreach ($alamat as $a) : ?>
                <ul>
                    <li><?= $a['tipe']; ?></li>
                    <li><?= $a['alamat']; ?></li>
                    <li><?= $a['kota']; ?></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?> <!-- menandakan section 'content' diakhiri -->