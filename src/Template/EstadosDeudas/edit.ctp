<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $estadosDeuda->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $estadosDeuda->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Estados Deudas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="estadosDeudas form large-9 medium-8 columns content">
    <?= $this->Form->create($estadosDeuda) ?>
    <fieldset>
        <legend><?= __('Edit Estados Deuda') ?></legend>
        <?php
            echo $this->Form->input('descripcion');
            echo $this->Form->input('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
