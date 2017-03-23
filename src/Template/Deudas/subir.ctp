<?= $this->element('volverAtras') ?>
<div class = "well">
  <?= $this->Form->create($deuda, ['type' => 'file']); ?>
  <?= $this->Form->input('file',['label'=>'', 'type' => 'file','enctype' => 'multipart/form-data']); ?>
    <div class="container-fluid">

            <div class="col-xl-2">
                <?= $this->Form->submit('Subir', ['type'=>'submit', 'class' => 'form-controlbtn btn-info']); ?>
            </div>

  </div>
  <?= $this->Form->end(); ?>
</div>
