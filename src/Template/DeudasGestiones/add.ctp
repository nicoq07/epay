<div class="deudasGestiones form large-9 medium-8 columns content">
    <?= $this->Form->create($deudasGestione) ?>
    <fieldset>
        <legend><?= __('Nueva gestión') ?></legend>
        <?php
            echo $this->Form->input('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
