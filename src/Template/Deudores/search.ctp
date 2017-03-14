<div class="row">
    <div class="page-header">
        <h3>Deudor: </h3>
    </div>
    <div class="table-responsive">
    <table class="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>

                <th scope="col"><?= $this->Paginator->sort('Id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre',['label' => 'Nombre y Apellido']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('calificacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('direccion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dni') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>

                <?php if (!empty($deudore)){   ?>

                <td><?= $this->Number->format($deudore->Id) ?></td>
                <td><?= h($deudore->calificacion) ?></td>
                <td><?= h($deudore->active) ?></td>
                <td><?= h($deudore->created->format('d-m-Y')) ?></td>
                <td><?= h($deudore->modified->format('d-m-Y')) ?></td>
                <td><?= h($deudore->direccion) ?></td>
                <td><?= $this->Number->format($deudore->dni) ?></td>
                <td><?= h($deudore->nombre) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $deudore->Id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $deudore->Id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $deudore->Id], ['confirm' => __('Are you sure you want to delete # {0}?', $deudore->Id)]) ?>
                </td>
                <?php } ?>
            </tr>
        </tbody>
    </table>
</div>
