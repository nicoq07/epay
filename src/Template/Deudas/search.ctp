<div class="row">
    <div class="page-header">
    <h3>Deudas de: <?= h($deudores) ?></h3>
    </div>
    <div class="table-responsive">
    <table class="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('producto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numero_producto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('capital_inicial') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_mora') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dias_mora') ?></th>
                <th scope="col"><?= h('Gestiones') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($deudas as $deuda): ?>
            <tr>
                <td><?= h($deuda->producto) ?></td>
                <td><?= h($deuda->numero_producto) ?></td>
                <td><?= $this->Number->format($deuda->capital_inicial) ?></td>
                <td><?= $this->Number->format($deuda->total) ?></td>
                <td><?= h($deuda->fecha_mora) ?></td>
                <td><?= h($deuda->dias_mora) ?></td>
                <td>
                  <?= $this->Html->link(__('Nueva'), ['controller' => 'DeudasGestiones', 'action' => 'add', $deuda->Id],['class' => 'btn btn-sm btn-primary']) ?>
                  <?= $this->Html->link(__('Ver'), ['controller' => 'DeudasGestiones', 'action' => 'index', $deuda->Id],['class' => 'btn btn-sm btn-info']) ?>
                </td>
                </td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $deuda->Id],['class' => 'btn btn-sm btn-success']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $deuda->Id],['class' => 'btn btn-sm btn-warning']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
