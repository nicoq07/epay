  <div class="row">
      <?= $this->element('volverAtras') ?>
        <div class="page-header">
            <h3><?= h($deudore->presentacionSimple) ?></h3>
        </div>
       <div class="page-header">
           <?= $this->Html->link(__('Agregar telefono'), ['controller' => 'DeudoresTelefonos', 'action' => 'add', $deudore->Id],['class' => 'btn btn-xl btn-success']) ?>
           <?php if ($current_user['role_id'] === 1 || $current_user['role_id'] === 2 ) 
            
           $this->Html->link(__('Editar deudor'), ['action' => 'edit', $deudore->Id],['class' => 'btn btn-xl btn-warning']) 
             ?>
        </div>
<div class="well table-responsive">
        <table class="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <tr>
            <th scope="row"><h3><?= __('DNI') ?></h3></th>
            <td><h3><?= h($deudore->dni) ?></h3></td>
        </tr>
            <?php if (!empty($deudore->deudas)): ?>
            <?php foreach ($deudore->deudores_telefonos as $telefono): ?>
        <tr>
            <th scope="row"><h4><?= __('Telefono ' . $telefono->descripcion) ?>  <?= $this->Html->link(__('Editar'), ['controller' => 'DeudoresTelefonos', 'action' => 'edit', $telefono->Id],['class' => 'btn btn-sm']) ?></h4>
            </th>
            <td><h4><?= $telefono->telefono; ?></h4></td>
            

        </tr>
            <?php endforeach; ?>
        <?php endif; ?>
<!--
        <tr>
            <th scope="row"><?= __('Nombre y Apellido') ?></th>
            <td><?= h($deudore->nombre) ?></td>
        </tr>
-->
<!--
        <tr>
            <th scope="row"><?= __('Calificacion') ?></th>
            <td><?= h($deudore->calificacion) ?></td>
        </tr>
-->
        <tr>
            <th scope="row"><?= __('Direccion') ?></th>
            <td><?= h($deudore->direccion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Provincia') ?></th>
            <td><?= h($deudore->provincia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Localidad') ?></th>
            <td><?= h($deudore->localidad) ?></td>
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
        
<!--
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($deudore->created->format('d/m/Y')) ?></td>
        </tr>
-->
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($deudore->modified->format('d/m/Y')) ?></td>
        </tr>
            
<!--
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $deudore->active ? __('Sí') : __('No'); ?></td>
        </tr>
-->
    </table>
</div>
<div class="well">
    <h3> Deudas a cobrar : </h3>
<div class="table-responsive">
          <table class="table table-striped table-hover"  cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Producto') ?></th>
                <th scope="col"><?= __('Numero producto') ?></th>
                <th scope="col"><?= __('Capital inicial') ?></th>
                <th scope="col"><?= __('Total actualizado') ?></th>
                <th scope="col"><?= __('Fecha mora') ?></th>
                <th scope="col"><?= __('Estado') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
               <?php if (!empty($deudore->deudas)): ?>
            <?php foreach ($deudore->deudas as $deuda): ?>
            <tr>
                <td><?= h($deuda->producto) ?></td>
                <td><?= h($deuda->numero_producto) ?></td>
                <td><?= $this->Number->format($deuda->capital_inicial,[
                                      'before' => '$',
                                      'locale' => 'es_Ar'
                                      ]) ?></td>
                <td><?= $this->Number->format($deuda->total,[
                                      'before' => '$',
                                      'locale' => 'es_Ar'
                                      ])?></td>
                <td><?= h($deuda->fecha_mora->format('d/m/Y')) ?></td>
                <td><?= $deuda->has('estados_deuda') ? h($deuda->estados_deuda->descripcion) : '' ?></td>
                 <td class="actions">
                  <?= $this->Html->link(__('Nueva gestion'), ['controller' => 'DeudasGestiones', 'action' => 'add', $deuda->Id],['class' => 'btn btn-sm btn-primary']) ?>
                    <?= $this->Html->link(__('Ver'), ['controller' => 'Deudas','action' => 'view', $deuda->Id],['class' => 'btn btn-sm btn-success']) ?>
                     <?php if ($current_user['role_id'] === 1 || $current_user['role_id'] === 2 ) {?>
                    <?= $this->Html->link(__('Editar'), ['controller' => 'Deudas','action' => 'edit', $deuda->Id],['class' => 'btn btn-sm btn-warning']) ?>
                     <?php } ?>
                </td>
            </tr>

            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
