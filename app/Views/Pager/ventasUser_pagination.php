<?php if ($pager) : ?>
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php if ($pager->hasPrevious()) : ?>
                <li class="page-item">
                    <a class="page-link" href="<?= base_url('ventas/usuario/' . $id . '/' . $pager->getPreviousPageNumber()) ?>" aria-label="Previous">
                        <span aria-hidden="true">&lsaquo;</span>
                    </a>
                </li>
            <?php endif ?>

            <?php foreach ($pager->links() as $link) : ?>
                <li class="page-item<?= $link['active'] ? ' active' : '' ?>">
                    <a class="page-link" href="<?= base_url('ventas/usuario/' . $id . '/' . $link['title']) ?>">
                        <?= $link['title'] ?>
                    </a>
                </li>
            <?php endforeach ?>

            <?php if ($pager->hasNext()) : ?>
                <li class="page-item">
                    <a class="page-link" href="<?= base_url('ventas/usuario/' . $id . '/' . $pager->getNextPageNumber()) ?>" aria-label="Next">
                        <span aria-hidden="true">&rsaquo;</span>
                    </a>
                </li>
            <?php endif ?>
        </ul>
    </nav>
<?php endif ?>