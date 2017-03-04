
<div class="deudores form large-9 medium-8 columns content">
    <?= $this->Form->create($deudore) ?>
    <fieldset>
        <legend><?= __('Agregar deudor') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('apellido');
            echo $this->Form->input('calificacion');
            echo $this->Form->input('categoria');
            echo $this->Form->input('cantidad');
            echo $this->Form->input('laboral');
            echo $this->Form->input('localidad');
            echo $this->Form->input('provincia');
            echo $this->Form->input('active');
            echo $this->Form->input('direccion');
            echo $this->Form->input('dni');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
