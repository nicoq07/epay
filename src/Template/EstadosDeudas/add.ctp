<?= $this->element('volverAtras') ?>
<div class="estadosDeudas form large-9 medium-8 columns content">
    <?= $this->Form->create($estadosDeuda) ?>
    <fieldset>
        <legend><?= __('Nuevo estado') ?></legend>
        <?php
            echo $this->Form->input('descripcion');
            echo $this->Form->input('active',['label'=> 'Activo']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
