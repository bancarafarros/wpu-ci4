<!-- memanggil file template.php yang merupakan header dan footer -->
<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?> <!-- menandakan section 'content' dimulai -->
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Hello World!</h1>
        </div>
    </div>
</div>
<?= $this->endSection(); ?> <!-- menandakan section 'content diakhiri -->