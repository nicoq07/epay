<div class="deudoresTelefonos form large-9 medium-8 columns content">
    <?= $this->element('volverAtras') ?>
    <?= $this->Form->create($deudoresTelefono) ?>
    <fieldset>
        <legend><?= __('Agregar nuevo telefono') ?></legend>
        <?php
//            echo $this->Form->input('deudor_id', ['options' => $deudores]);
            echo $this->Form->input('descripcion');
            echo $this->Form->input('telefono');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
