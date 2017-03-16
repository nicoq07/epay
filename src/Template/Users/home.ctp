<?= $this->element('volverAtras') ?>
<h2 align='center'> Bienvenido <?= $this->Html->link($current_user['nombre'], ['controller' => 'Users', 'action' => 'view', $current_user['id']])?></h2>
