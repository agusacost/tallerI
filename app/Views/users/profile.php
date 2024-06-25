<main>
    <div class="perfil-main">
        <?php $session = session(); ?>
        <div class="perfil-container">
            <?php if ($session->get('isLoggedIn')) : ?>
                <h1 class="perfil-title">Perfil de Usuario</h1>
                <div class="perfil-info">
                    <img class="avatar" src="<?= base_url('assets/img/avatar.png') ?>" alt="imagen">
                    <p class="perfil-info-item"><strong>Nombre:</strong> <?= $session->get('name') ?></p>
                    <p class="perfil-info-item"><strong>Apellido:</strong> <?= $session->get('surname') ?></p>
                    <p class="perfil-info-item"><strong>Correo Electrónico:</strong> <?= $session->get('email') ?></p>
                    <div class="perfil-buttons">
                        <a href="<?= base_url('/edit/' . $session->get('id')) ?>" class="perfil-btn">Editar datos</a>
                        <a href="<?= base_url('ventas/usuario/' . $session->get('id') . '/1') ?>" class="perfil-btn">Historial de compras</a>
                    </div>
                </div>
                <a href="<?= base_url('/logout') ?>" class="perfil-logout">Cerrar Sesión</a>
            <?php endif; ?>
        </div>
    </div>
</main>