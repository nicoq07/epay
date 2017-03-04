<div class="deudasGestiones form large-9 medium-8 columns content">
    <?= $this->Form->create($deudasGestione) ?>
    <fieldset>
        <legend><?= __('Editar Gestion') ?></legend>
        <?php
//            echo $this->Form->input('deuda_id', ['options' => $deudas]);
            echo $this->Form->input('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
