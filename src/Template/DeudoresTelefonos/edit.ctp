
<div class="deudoresTelefonos form large-9 medium-8 columns content">
    <?= $this->Form->create($deudoresTelefono) ?>
    <fieldset>
        <legend><?= __('Editar telefono') ?></legend>
        <?php
            echo $this->Form->input('descripcion', ['label' => 'Descripción (se recomienda palabras cortas. Ej: "viable", "no viable")']);
            echo $this->Form->input('telefono');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
