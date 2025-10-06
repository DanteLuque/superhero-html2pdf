<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url() ?>">Tarea07</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
      aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarText">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url() ?>">Inicio</a>
        </li>
      </ul>

      <span class="navbar-text">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <?php if (!session()->get('isLoggedIn')): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('auth/login') ?>">Iniciar sesión</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('auth/register') ?>">Registrate</a>
            </li>

          <?php else: ?>
            <li class="nav-item">
              <div class="d-flex align-items-center gap-2">
                <img
                  src="<?= session()->get('user.avatar')
                          ? '/uploads/' . session()->get('user.avatar')
                          : '/images/user.jpg' ?>"
                  width="50"
                  height="50"
                  class="rounded-circle"
                  alt="avatar">
                <span class="nav-link mb-0"><?= session()->get('user.username') ?></span>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('auth/logout') ?>">Cerrar sesión</a>
            </li>
          <?php endif; ?>

        </ul>
      </span>

    </div>
  </div>
</nav>