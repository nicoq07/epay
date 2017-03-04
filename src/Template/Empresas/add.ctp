<div class="empresas form large-9 medium-8 columns content">
    <?= $this->Form->create($empresa) ?>
    <fieldset>
        <legend><?= __('Agregar cliente') ?></legend>
        <?php
            echo $this->Form->input('descripcion', ['label'=> 'Nombre', 'required' => true]);
            echo $this->Form->input('cuit', ['label'=> 'CUIT', 'type' => 'number' ,'placeholder' => 'solo números']);
            echo $this->Form->input('direccion', ['label'=> 'Dirección']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
