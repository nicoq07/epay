<?= $this->element('volverAtras') ?>
<div class="row well">
    <h3><?= __('Estados') ?></h3>
    <table class="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active',['label' => 'Activo']) ?></th>
<!--                <th scope="col" class="actions"><?= __('Actions') ?></th>-->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($estadosDeudas as $estadosDeuda): ?>
            <tr>
                <td><?= $this->Number->format($estadosDeuda->id) ?></td>
                <td><?= h($estadosDeuda->descripcion) ?></td>
                <td><?= $estadosDeuda->active ? __('Si') : __('No'); ?></td>
<!--
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $estadosDeuda->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $estadosDeuda->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $estadosDeuda->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estadosDeuda->id)]) ?>
                </td>
-->
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?= $this->element('footer') ?>
</div>
