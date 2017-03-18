  <?= $this->Form->create('Post', ['url' => ['action' => 'search']]); ?>
  <?= $this->Form->input('busqueda',   ['label' => '' , 'placeholder' => 'Puede buscar por DNI, nombre ó numero de producto ' ]);?>
  <?= $this->Form->end() ?>
