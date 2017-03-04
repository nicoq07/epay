  <?= $this->Form->create($cartera, ['type' => 'file']); ?>
  <?= $this->Form->input('file',['type' => 'file','enctype' => 'multipart/form-data']); ?>
  <?= $this->Form->submit('Subir', ['type'=>'submit', 'class' => 'form-controlbtn btn-default']); ?>
  <?= $this->Form->end(); ?>
