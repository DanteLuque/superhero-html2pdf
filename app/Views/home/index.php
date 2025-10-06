<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<header class="blog-header py-5">
    <h1>Bienvenido :D<?= session()->get('user.username') ? ', ' . session()->get('user.username')  : '' ?></h1>
    <p>Esta es la vista libre, no es necesario que estes logeado... a menos que quieras tocar esos botones 👀</p>
</header>

<div class="container">
    <?= $this->include('common/msg-warning') ?>

    <div class="row g-4">

        <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ingreso solo para Admin</h5>
                    <p class="card-text">Solo puedes ingresar a esta sección si eres un usuario Admin.</p>
                    <a href="<?= base_url('testrol/admin') ?>" class="btn btn-primary">Entrar aqui</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ingreso para usuario o admin</h5>
                    <p class="card-text">Puedes ingresar aqui siendo un usuario normal o tambien un usuario Admin</p>
                    <a href="<?= base_url('testrol/user') ?>" class="btn btn-primary">Entrar aqui</a>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>