 <?= $this->element('volverAtras') ?>
<div class="carteras form large-9 medium-8 columns content">
    <?= $this->Form->create($cartera) ?>
    <fieldset>
        <legend><?= __('Exportar Informe') ?></legend>
        <?php
           
//        $this->Form->input('Id',['label' => 'Cartera' , 'type'=> 'select', 'options' => $carteras, 'empty'=> false, ]);
          echo $this->Form->input(
                'cartera', 
                [
                    'type' => 'select',
                    'multiple' => false,
                    'options' => $carteras, 
                    'empty' => false,
                    
                ]
            );
        ?>
    </fieldset>
    
    <?= $this->Form->button(__('Guardar'),['class'=>'btn btn-xl btn-info'])?>
     <?= $this->Form->end(); ?>
   
</div>