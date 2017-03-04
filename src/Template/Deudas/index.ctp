<div class="row">
    <div class="page-header">
    <h3>Deudas</h3>
    </div>
    <div>
    <?= $this->element('search') ?>
    </div>
    <div class="table-responsive">
    <table class="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('deudor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cartera_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id', ['label'=>'Asignado a:']) ?></th>
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

                <td><?= $deuda->has('deudore') ? $this->Html->link($deuda->deudore->presentacionSimple, ['controller' => 'Deudores', 'action' => 'view', $deuda->deudore->Id]) : '' ?></td>
                <td><?= $deuda->has('cartera') ? $this->Html->link($deuda->cartera->descripcion, ['controller' => 'Carteras', 'action' => 'view', $deuda->cartera->Id]) : '' ?></td>
                 <td><?= $deuda->has('user') ? $this->Html->link($deuda->user->presentacion, ['controller' => 'Carteras', 'action' => 'view', $deuda->cartera->Id]) : '' ?></td>
                <td><?= h($deuda->producto) ?></td>
                <td><?= h($deuda->numero_producto) ?></td>
                <td><?= $this->Number->format($deuda->capital_inicial) ?></td>
                <td><?= $this->Number->format($deuda->total) ?></td>
                <td><?= h($deuda->fecha_mora) ?></td>
                <td><?= h($deuda->dias_mora) ?></td>
                <td>
                  <?= $this->Html->link(__('Nueva'), ['controller' => 'DeudasGestiones', 'action' => 'add', $deuda->Id],['class' => 'btn btn-sm btn-primary']) ?>
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
    <?= $this->element('footer') ?>
</div>
