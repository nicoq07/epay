</nav>
<div class="deudas form large-9 medium-8 columns content">
    <?= $this->Form->create($deuda) ?>
    <fieldset>
        <legend><?= __('Nueva deuda') ?></legend>
        <?php
            echo $this->Form->input('deudor_id', ['options' => $deudores]);
            echo $this->Form->input('cartera_id', ['options' => $carteras]);
            echo $this->Form->input('producto');
            echo $this->Form->input('active');
            echo $this->Form->input('capital_inicial');
            echo $this->Form->input('numero_producto');
            echo $this->Form->input('usuario_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('total',['label' => 'Capital actualizado']);
            echo $this->Form->input('fecha_mora', ['empty' => true]);
            echo $this->Form->input('dias_mora', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
