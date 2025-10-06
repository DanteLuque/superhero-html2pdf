<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<div class="container my-4">
    <h3>Registro de Cliente</h3>

    <?= $this->include('common/msg-error') ?>

    <form method="POST" action="<?= base_url('usuarios/save_db') ?>" enctype="multipart/form-data">
        <div class="card mb-3">
            <div class="card-header">Datos de Usuario</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Nombres</label>
                        <input
                            type="text"
                            name="nombres"
                            class="form-control"
                            minlength="2"
                            required
                            autofocus
                            value="<?= set_value('nombres') ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Apellidos</label>
                        <input
                            type="text"
                            name="apellidos"
                            class="form-control"
                            minlength="2"
                            required
                            value="<?= set_value('apellidos') ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="avatar">Avatar</label>
                        <input
                            type="file"
                            class="form-control"
                            name="avatar"
                            id="avatar"
                            accept="image/png,image/jpeg,image/jpg">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Username</label>
                        <input
                            type="text"
                            name="username"
                            class="form-control"
                            minlength="4"
                            maxlength="70"
                            required
                            value="<?= set_value('username') ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Rol</label>
                        <select name="rol" class="form-select" required>
                            <option value="">Seleccione un rol</option>
                            <option value="ADMIN" <?= set_select('rol', 'ADMIN') ?>>ADMIN</option>
                            <option value="USER" <?= set_select('rol', 'USER') ?>>USER</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="userpass">Contraseña</label>
                        <div class="input-group">
                            <input
                                type="password"
                                id="userpass"
                                name="userpass"
                                class="form-control"
                                pattern="^(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d]).{8,}$"
                                title="La contraseña debe tener mínimo 8 caracteres, una mayúscula, un número y un carácter especial"
                                required>
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i data-lucide="eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Registrarse</button>
    </form>
</div>

<?= $this->endSection() ?>