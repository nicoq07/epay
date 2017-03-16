<div class="deudasGestiones form large-9 medium-8 columns content">
    <?= $this->element('volverAtras') ?>
    <?= $this->Form->create($deudasGestione) ?>
    <fieldset>
        <legend><?= __('Nueva gestión') ?></legend>
        <?php
            echo $this->Form->input('descripcion');
            if (!empty($deuda))
                {
                     echo $this->Form->select('estado_id', $estados_deuda->toArray(),['default' => $deuda->estado_id]);
                }  
        ?>
    </fieldset>

    <div style="margin-top: 20px">
        <?= $this->Form->button(__('Guardar')) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
