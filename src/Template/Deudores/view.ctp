  <div class="row">
        <div class="page-header">
            <h3><?= h($deudore->presentacionCompleta) ?></h3>
        </div>
       <div class="page-header">
           <?= $this->Html->link(__('Agregar telefono'), ['controller' => 'DeudoresTelefonos', 'action' => 'add', $deudore->Id],['class' => 'btn btn-xl btn-success']) ?>
        </div>
        <div class="table-responsive">
        <table class="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <tr>
            <th scope="row"><?= __('Calificacion') ?></th>
            <td><?= h($deudore->calificacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Direccion') ?></th>
            <td><?= h($deudore->direccion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre y Apellido') ?></th>
            <td><?= h($deudore->nombre) ?></td>
        </tr>
        <?php if(!empty($deudore->laboral)) { ?>
        <tr>
            <th scope="row"><?= __('Laboral') ?></th>
            <td><?= h($deudore->laboral) ?></td>
        </tr>
        <?php } ?>
        <?php if(!empty($deudore->categoria)) { ?>
        <tr>
            <th scope="row"><?= __('Categoria') ?></th>
            <td><?= h($deudore->categoria) ?></td>
        </tr>
        <?php } ?>
            <?php if(!empty($deudore->cantidad)) { ?>
        <tr>
            <th scope="row"><?= __('Cantidad') ?></th>
            <td><?= h($deudore->cantidad) ?></td>
        </tr>
            <?php } ?>
<!--
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($deudore->Id) ?></td>
        </tr>
-->
        <tr>
            <th scope="row"><?= __('Dni') ?></th>
            <td><?= $this->Number->format($deudore->dni) ?></td>
        </tr>
<!--
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($deudore->created) ?></td>
        </tr>
-->
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($deudore->modified) ?></td>
        </tr>
            <?php if (!empty($deudore->deudas)): ?>
            <?php foreach ($deudore->deudores_telefonos as $telefono): ?>
        <tr>
            <th scope="row"><?= __('Telefono ' . $telefono->descripcion) ?> <?= $this->Html->link(__('Editar'), ['controller' => 'DeudoresTelefonos', 'action' => 'edit', $telefono->Id],['class' => 'btn btn-sm']) ?></th>
            <td><?= $telefono->telefono; ?></td>
            <td class="actions">
                  
            </td>
                    
        </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $deudore->active ? __('Sí') : __('No'); ?></td>
        </tr>
    </table>
</div>
<div class="well">
    <h3> Deudas correspondientes a : </h3>
<div class="table-responsive">
          <table class="table table-striped table-hover"  cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Producto') ?></th>
                <th scope="col"><?= __('Numero producto') ?></th>
                <th scope="col"><?= __('Capital inicial') ?></th>
                <th scope="col"><?= __('Total actualizado') ?></th>
                <th scope="col"><?= __('Fecha mora') ?></th>
                <th scope="col"><?= __('Dias mora') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
               <?php if (!empty($deudore->deudas)): ?>
            <?php foreach ($deudore->deudas as $deuda): ?>
            <tr>
                <td><?= h($deuda->producto) ?></td>
                <td><?= h($deuda->numero_producto) ?></td>
                <td><?= $this->Number->format($deuda->capital_inicial) ?></td>
                <td><?= $this->Number->format($deuda->total) ?></td>
                <td><?= h($deuda->fecha_mora) ?></td>
                <td><?= h($deuda->dias_mora) ?></td>
                 <td class="actions">
                  <?= $this->Html->link(__('Nueva'), ['controller' => 'DeudasGestiones', 'action' => 'add', $deuda->Id],['class' => 'btn btn-sm btn-primary']) ?>
                    <?= $this->Html->link(__('Ver'), ['controller' => 'Deudas','action' => 'view', $deuda->Id],['class' => 'btn btn-sm btn-success']) ?>
                    <?= $this->Html->link(__('Editar'), ['controller' => 'Deudas','action' => 'edit', $deuda->Id],['class' => 'btn btn-sm btn-warning']) ?>
                </td>
            </tr>
            
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>