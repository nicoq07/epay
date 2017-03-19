<?= $this->element('volverAtras') ?>
<div class = "well">
  <?= $this->Form->create($cartera, ['type' => 'file']); ?>
  <?= $this->Form->input('file',['label'=>'', 'type' => 'file','enctype' => 'multipart/form-data']); ?>
    <div class="container-fluid">
         
            <div class="col-xl-2"> 
                <?= $this->Form->submit('Subir', ['type'=>'submit', 'class' => 'form-controlbtn btn-info']); ?>
            </div>
            <div  style="padding: 5px 0px 0px 0px">
                <div class="col-2">
                  <?= $this->Form->submit('Confirmar', ['name'=>'btnOk' ,'class' => 'btn  btn-success btn-sm']); ?>
                </div>
            </div>
            
            
  </div>
  <?= $this->Form->end(); ?>
</div>
  
