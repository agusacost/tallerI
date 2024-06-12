<main>
    <div class="container">
        <div class="container-success">
            <h1>Compra realizada con éxito</h1>
            <p><?= session()->getFlashdata('mensaje') ?></p>
            <p>Gracias por confiar en nosotros! Keepgreen</p>
            <a class="btn-vuelta" href="<?= base_url('/productos') ?>">Volver al catálogo</a>
        </div>
    </div>
</main>