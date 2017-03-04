<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Deudores Telefono'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Deudores'), ['controller' => 'Deudores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Deudore'), ['controller' => 'Deudores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deudoresTelefonos index large-9 medium-8 columns content">
    <h3><?= __('Deudores Telefonos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deudor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefono') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($deudoresTelefonos as $deudoresTelefono): ?>
            <tr>
                <td><?= $this->Number->format($deudoresTelefono->Id) ?></td>
                <td><?= $deudoresTelefono->has('deudore') ? $this->Html->link($deudoresTelefono->deudore->presentacionCompleta, ['controller' => 'Deudores', 'action' => 'view', $deudoresTelefono->deudore->Id]) : '' ?></td>
                <td><?= h($deudoresTelefono->telefono) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $deudoresTelefono->Id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $deudoresTelefono->Id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $deudoresTelefono->Id], ['confirm' => __('Are you sure you want to delete # {0}?', $deudoresTelefono->Id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
