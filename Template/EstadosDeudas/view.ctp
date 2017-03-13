<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Estados Deuda'), ['action' => 'edit', $estadosDeuda->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Estados Deuda'), ['action' => 'delete', $estadosDeuda->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estadosDeuda->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Estados Deudas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Estados Deuda'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="estadosDeudas view large-9 medium-8 columns content">
    <h3><?= h($estadosDeuda->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($estadosDeuda->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($estadosDeuda->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $estadosDeuda->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
