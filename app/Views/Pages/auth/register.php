<main>
    <section class="container bg-login">

        <div class="wrapper-register">
            <?php $validation = \Config\Services::validation(); ?>
            <h1><?= isset($user) ? 'Editar Usuario' : 'Registrate!'; ?></h1>
            <form action="<?= isset($user) ? site_url('/user/formValidation/' . $user['id']) : site_url('/user/formValidation') ?>" method="post">
                <!-- Campo oculto para el ID -->
                <?php if (isset($user)) : ?>
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <?php endif; ?>

                <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                    <div class="error-form"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif ?>
                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                    <div class="success-form"><?= session()->getFlashdata('success'); ?></div>
                <?php endif ?>

                <label for="name">Nombre
                    <input type="text" id="name" placeholder="Tu nombre" name="name" value="<?= isset($user) ? $user['name'] : '' ?>" required>
                    <!--Error -->
                    <?php if ($validation->getError('name')) { ?>
                        <div class='error-form'>*
                            <?= $error = $validation->getError('name'); ?>
                        </div>
                    <?php } ?>
                </label>
                <label for="surname">Apellido
                    <input type="text" id="surname" placeholder="Tu apellido" name="surname" value="<?= isset($user) ? $user['surname'] : '' ?>" required>
                    <!--Error -->
                    <?php if ($validation->getError('surname')) { ?>
                        <div class='error-form'>*
                            <?= $error = $validation->getError('surname'); ?>
                        </div>
                    <?php } ?>
                </label>
                <label for="email">Correo
                    <input type="email" placeholder="Email" name="email" value="<?= isset($user) ? $user['email'] : '' ?>" required>
                    <?php if ($validation->getError('email')) { ?>
                        <div class='error-form'>*
                            <?= $error = $validation->getError('email'); ?>
                        </div>
                    <?php } ?>
                </label>
                <label for="password">Contraseña
                    <input type="password" placeholder="Password" name="password">
                    <?php if ($validation->getError('password')) { ?>
                        <div class='error-form'>*
                            <?= $error = $validation->getError('password'); ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($user)) : ?>
                        <small>*Deje en blanco si no desea cambiar la contraseña</small>
                    <?php endif; ?>
                </label>
                <?php if (isset($user)) : ?>
                    <?php if (session()->get('id_perfil') == 1) : ?>
                        <label for="id_perfil">Tipo de usuario:
                            <select name="id_perfil" id="id_perfil" required>
                                <option value="1" <?= isset($user) && $user['id_perfil'] == 1 ? 'selected' : '' ?>>Admin</option>
                                <option value="2" <?= isset($user) && $user['id_perfil'] == 2 ? 'selected' : '' ?>>User</option>
                            </select>
                        </label>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if (isset($user)) : ?>
                    <?php if ($user['baja'] === 'SI') : ?>
                        <label for="baja">El usuario esta dado de baja. Dar de alta
                            <input type="checkbox" name="baja" value="si">
                        </label>
                    <?php else : ?>
                        <label for="baja">Dar de baja el usuario
                            <input type="checkbox" name="baja" value="no">
                        </label>
                    <?php endif; ?>
                <?php endif; ?>
                <button type="submit"><?= isset($user) ? 'Actualizar Usuario' : 'Registrarse' ?></button>
            </form>
            <?php if (!isset($user)) : ?>
                <div class="member">
                    Ya tienes una cuenta? <a href="<?= base_url('/login') ?>">Inicia Sesión</a>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>