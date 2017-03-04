<div class="carteras form large-9 medium-8 columns content">
    <?= $this->Form->create($cartera) ?>
    <fieldset>
        <legend><?= __('Editar Cartera') ?></legend>
        <?php
            echo $this->Form->input('descripcion');
            echo $this->Form->input('empresa_id', ['label' => 'Cliente'] , ['options' => $empresas]);
            echo $this->Form->input('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
