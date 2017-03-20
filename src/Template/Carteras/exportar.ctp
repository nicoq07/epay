 <?= $this->element('volverAtras') ?>
<div class="carteras form large-9 medium-8 columns content">
   
    <fieldset>
        <legend><?= __('Exportar Informe') ?></legend>
        <?php
           
//        $this->Form->input('Id',['label' => 'Cartera' , 'type'=> 'select', 'options' => $carteras, 'empty'=> false, ]);
          echo $this->Form->input(
                'Id', 
                [
                    'type' => 'select',
                    'multiple' => false,
                    'options' => $carteras, 
                    'empty' => true
                ]
            );
        ?>
    </fieldset>
    <?= $this->Form->button(__('Exportar')) ?>
   
   
</div>