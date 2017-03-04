<div class="well">
    <h3><?= h($empresa->descripcion) ?></h3>
    <table class="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <tr>
            <th scope="row"><?= __('Descripción') ?></th>
            <td><?= h($empresa->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CUIT') ?></th>
            <td><?= h($empresa->cuit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Direccion') ?></th>
            <td><?= h($empresa->direccion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($empresa->Id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creada') ?></th>
            <td><?= h($empresa->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificada') ?></th>
            <td><?= h($empresa->modified) ?></td>
        </tr>
    </table>
</div>
<div class="well">
        <h4><?= __('Carteras del Cliente') ?></h4>
        <?php if (!empty($empresa->carteras)): ?>
    <table class="table table-striped table-hover" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Activa') ?></th>
                <th scope="col"><?= __('Creada') ?></th>
                <th scope="col"><?= __('Modificada') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($empresa->carteras as $carteras): ?>
            <tr>
                <td><?= h($carteras->Id) ?></td>
                <td><?= h($carteras->descripcion) ?></td>
                <td><?= $carteras->active ? __('Si') : __('No'); ?></td>
                <td><?= h($carteras->created) ?></td>
                <td><?= h($carteras->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('+ INFO'), ['controller' => 'Carteras', 'action' => 'view', $carteras->Id],['class' => 'btn btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['controller' => 'Carteras', 'action' => 'edit', $carteras->Id],['class' => 'btn btn-sm btn-warning']) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['controller' => 'Carteras', 'action' => 'delete', $carteras->Id],['class' => 'btn btn-sm btn-danger','confirm' => __('Seguro de borrar la cartera?', $carteras->Id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
