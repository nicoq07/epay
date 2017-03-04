  <?= $this->Form->create('Post', ['url' => ['action' => 'search']]); ?>
  <?= $this->Form->input('busqueda',   ['label' => '' , 'placeholder' => 'Ingrese DNI, solo números' , 'type' => 'number' ]);?>
  <?= $this->Form->end() ?>
