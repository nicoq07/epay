<div class="carteras form large-9 medium-8 columns content">
    <?= $this->Form->create($cartera) ?>
    
    <fieldset>
        <legend><?= __('Nueva Cartera') ?></legend>
        <?php
           
            echo $this->Form->input('descripcion');
            echo $this->Form->label('empresa_id', 'Cliente');
            if (!empty($empresaElegida))
                {
                     echo $this->Form->select('empresa_id', $empresas->toArray(),['default' => $empresaElegida]);
                }  
            else
                {
                    echo $this->Form->select('empresa_id', $empresas->toArray(), ['label' => 'Clientes'] );
                }
        
   
           // echo $this->Form->input('active',['label' => 'Activa' ]);
        ?>
    </fieldset>
    <div class="page-header" > </div>
    <?= $this->Form->button(__('Guardar'),['class'=>'btn btn-xl btn-info'])?>
    <?= $this->Form->end() ?>
</div>
