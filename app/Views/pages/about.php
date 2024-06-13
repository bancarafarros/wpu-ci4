<!-- memanggil file template.php yang merupakan header dan footer -->
<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?> <!-- menandakan section 'content' dimulai -->
<div class="container">
    <div class="row">
        <div class="col">
            <h1>About Me</h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia, tempora. Maiores nam sunt nemo reprehenderit debitis iste illo officiis, sit impedit. Voluptate, numquam magnam culpa assumenda voluptatem vel sunt debitis!</p>
        </div>
    </div>
</div>
<?= $this->endSection(); ?> <!-- menandakan section 'content' diakhiri -->