
<main>
<section class="container bg-login">
    <div class="wrapper-register">
        <?php $validation = \Config\Services::validation(); ?>
        <h1>Registrate!</h1>
        <form action="<?= base_url('/register_user')?>" method="post">
        
        <?php if(!empty (session()->getFlashdata('fail'))):?>
     	    <div class="error-form"><?=session()->getFlashdata('fail');?></div>
            <?php endif?>
            <?php if(!empty (session()->getFlashdata('success'))):?>
     	    <div class="success-form "><?=session()->getFlashdata('success');?></div>
            <?php endif?>

            <label for="name">Nombre
            <input type="text" id="name" placeholder="Tu nombre" name="name">
           <!--Error -->
            <?php if($validation->getError('name')) {?>
                 <div class='error-form'>*
                  <?= $error = $validation->getError('name'); ?>
                 </div>
            <?php }?>
            </label>
            <label for="surname">Apellido
            <input type="text" id="surname" placeholder="Tu apellido" name="surname">
            <!--Error -->
             <?php if($validation->getError('surname')) {?>
                 <div class='error-form'>*
                  <?= $error = $validation->getError('surname'); ?>
                 </div>
            <?php }?>
            </label>
            <label for="email">Correo
            <input type="email" placeholder="Email" name="email">
            <?php if($validation->getError('email')) {?>
                <div class='error-form'>*
                 <?= $error = $validation->getError('email'); ?>
                </div>
            <?php }?>
            </label>
            <label for="password">Contraseña
            <input type="password" placeholder="Password" name="password">
            <?php if($validation->getError('password')) {?>
                <div class='error-form'>*
                 <?= $error = $validation->getError('password'); ?>
                </div>
            <?php }?>
            </label>
            <button type="submit">Registrarse</button>
        </form>
        <div class="member">
            Ya tienes una cuenta? <a href="<?= base_url('/login') ?>">Inicia Sesión</a>
        </div>
    </div>
</section>
</main>