
<main>
    <?php $session = session();?>
<section class="container bg-login">
    <div class="wrapper">
        <form action="<?= base_url('/signin')?>" method="post">
            
        <?php if(session()->getFlashdata('msg')):?>
            <div class="error-form">*
                <?=session()->getFlashdata('msg')?>
            </div>
            <?php endif;?>
            <?php if(!$session->get('isLoggedIn')):?>
            <h1>Inicia sesión</h1>
            <input type="email" placeholder="Email" name="email">
            <input type="password" placeholder="Password" name="password">
            <div class="recover">
                <a href="#">Olvidaste tu clave?</a>
            </div>
            <button type="submit">Iniciar sesión</button>
            <div class="member">
                Todavía no te registraste? <a href="<?= base_url('/register') ?>">Registrarse ahora</a>
            </div>
        </form>
        <?php else:?>
            <H1>Gracias por confiar en nosotros</H1>
        <?php endif?>
    </div>
</section>
</main>