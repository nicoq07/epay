<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Notificaciones'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="notificaciones form large-9 medium-8 columns content">
    <?= $this->Form->create($notificacione) ?>
    <fieldset>
        <legend><?= __('Add Notificacione') ?></legend>
        <?php
            echo $this->Form->input('descripcion');
            echo $this->Form->input('emisor');
            echo $this->Form->input('receptor', ['options' => $users]);
            echo $this->Form->input('leida');
            echo $this->Form->input('broadcast');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
