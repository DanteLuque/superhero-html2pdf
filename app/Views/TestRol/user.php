<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<header class="blog-header py-5">
    <h1>Bienvenido señor <?= session()->get('user.rol') === 'ADMIN' ? 'Admin' : 'Usuario'?></h1>
    <p>Entraste a la sección donde puede acceder tanto el admin como el usuario</p>
</header>
<?= $this->endSection() ?>