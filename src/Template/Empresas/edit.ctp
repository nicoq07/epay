
<div class="empresas form large-9 medium-8 columns content">
    <?= $this->Form->create($empresa) ?>
    <fieldset>
        <legend><?= __('Editar cliente') ?></legend>
        <?php
            echo $this->Form->input('descripcion');
            echo $this->Form->input('cuit');
            echo $this->Form->input('direccion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Gurdar')) ?>
    <?= $this->Form->end() ?>
</div>
