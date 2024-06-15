<main>
    <div class="bg-comprobante">
        <div class="comprobante-container">
            <h2 class="comprobante-title">Comprobante de Compra</h2>

            <h3 class="comprobante-subtitle">Detalles del Carrito</h3>
            <table class="comprobante-table">
                <thead>
                    <tr>
                        <th class="comprobante-th comprobante-p-nombre">Producto</th>
                        <th class="comprobante-th comprobante-p-precio">Precio</th>
                        <th class="comprobante-th comprobante-p-cantidad">Cantidad</th>
                        <th class="comprobante-th comprobante-p-subtotal">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ventaDetalle as $venta) : ?>
                        <tr>
                            <td class="comprobante-td comprobante-p-nombre"><?= $venta['producto_id'] ?></td>
                            <td class="comprobante-td comprobante-p-precio">$<?= number_format($venta['precio'], 2) ?></td>
                            <td class="comprobante-td comprobante-p-cantidad"><?= $venta['cantidad'] ?></td>
                            <td class="comprobante-td comprobante-p-subtotal">$<?= number_format($venta['precio'] * $venta['cantidad'], 2) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="comprobante-total-container">
                <p class="comprobante-total">Total: $<?= number_format($ventas['total_venta'], 2) ?></p>
            </div>

            <h3 class="comprobante-subtitle">Datos de Envío y Pago</h3>
            <p class="comprobante-info">Dirección: <?= $envio['direccion'] ?></p>
            <p class="comprobante-info">Ciudad: <?= $envio['ciudad'] ?></p>
            <p class="comprobante-info">Provincia: <?= $envio['provincia'] ?></p>
            <p class="comprobante-info">Código Postal: <?= $envio['codigo_postal'] ?></p>
            <p class="comprobante-info">Método de Envío: <?= $envio['metodo_envio'] == 1 ? 'Estándar - $1750' : 'Express - $3850' ?></p>

            <!-- Botón para generar y descargar el PDF -->
            <button type="button" class="comprobante-button" id="generarPDFButton" onclick="generarPDF()">Generar PDF</button>
        </div>
        <?php if (session()->get('id_perfil') == 2) : ?>
            <a class="comprobante-vuelta" href="<?= base_url('/productos/pagina/1') ?>">Volver al catalogo!</a>
        <?php else : ?>
            <a class="comprobante-vuelta" href="<?= base_url('/ventas_list/pagina/1') ?>">Volver</a>
        <?php endif; ?>
    </div>
</main>

<!-- Incluye jsPDF y html2canvas en tu vista -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

<script>
    // Función para generar y descargar el PDF al hacer clic en el botón
    function generarPDF() {
        const {
            jsPDF
        } = window.jspdf;
        const element = document.querySelector('.comprobante-container');
        const button = document.getElementById('generarPDFButton');

        // Ocultar el botón
        button.style.display = 'none';

        html2canvas(element).then(canvas => {
            const imgData = canvas.toDataURL('image/png');
            const pdf = new jsPDF('p', 'mm', 'a4');
            const imgProps = pdf.getImageProperties(imgData);
            const pdfWidth = pdf.internal.pageSize.getWidth();
            const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

            pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
            pdf.save('comprobante.pdf');

            // Mostrar el botón nuevamente
            button.style.display = 'block';
        });
    }
</script>