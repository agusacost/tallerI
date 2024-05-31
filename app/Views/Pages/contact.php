<main>
  <section class="contact-bg">
    <div class="container-form">
      <div class="content">
        <div class="left-side">
          <div class="address details">
            <i class="fas fa-map-marker-alt"></i>
            <div class="topic">Dirección</div>
            <div class="text-one">Santiago del estero 445</div>
            <div class="text-two">Corrientes, Corrientes. 3400</div>
          </div>
          <div class="phone details">
            <i class="fas fa-phone-alt"></i>
            <div class="topic">Teléfonos</div>
            <div class="text-one">+54 123-456-7890</div>
            <div class="text-two">+54 009-012-2018</div>
          </div>
          <div class="email details">
            <i class="fas fa-envelope"></i>
            <div class="topic">Email</div>
            <div class="text-one">rrhh@keepgreen.com</div>
            <div class="text-two">info@keepgreen.com</div>
          </div>
        </div>
        <div class="right-side">
          <div class="topic-text">Contactanos</div>
          <p>Si queres solicitar información sobre algun producto, saber sobre nuestra franquicia o formar parte dejanos un mensaje. Te contestaremos lo antes posible</p>
          <?php if (!empty(session()->getFlashdata('mensaje'))) : ?>
            <div class="success-form"><?= session()->getFlashdata('mensaje'); ?></div>
          <?php endif ?>
          <form action="<?= base_url('/contact/send') ?>" method="post">
            <div class="input-box">
              <input type="text" placeholder="Tu nombre" name="fullname" required>
            </div>
            <div class="input-box">
              <input type="text" placeholder="correo@correo.com" name="email" required>
            </div>
            <div class="input-box message-box">
              <textarea placeholder="Dejanos tu mensaje" type="text" cols="30" rows="10" name="message" required></textarea>
            </div>
            <div class="button">
              <button type="submit"> Enviar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>