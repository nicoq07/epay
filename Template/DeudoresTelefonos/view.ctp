<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Deudores Telefono'), ['action' => 'edit', $deudoresTelefono->Id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Deudores Telefono'), ['action' => 'delete', $deudoresTelefono->Id], ['confirm' => __('Are you sure you want to delete # {0}?', $deudoresTelefono->Id)]) ?> </li>
        <li><?= $this->Html->link(__('List Deudores Telefonos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deudores Telefono'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Deudores'), ['controller' => 'Deudores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deudore'), ['controller' => 'Deudores', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="deudoresTelefonos view large-9 medium-8 columns content">
    <h3><?= h($deudoresTelefono->Id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Deudore') ?></th>
            <td><?= $deudoresTelefono->has('deudore') ? $this->Html->link($deudoresTelefono->deudore->presentacionCompleta, ['controller' => 'Deudores', 'action' => 'view', $deudoresTelefono->deudore->Id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefono') ?></th>
            <td><?= h($deudoresTelefono->telefono) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($deudoresTelefono->Id) ?></td>
        </tr>
    </table>
</div>
