<div class="well">
    <h3><?= h('Deuda de: ') ; echo $this->Html->link($deuda->deudore->presentacionCompleta , ['controller' => 'Deudores', 'action' => 'view', $deuda->deudore->Id]) ?></h3>
    <table class="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <tr>
            <th scope="row"><?= __('Deudor') ?></th>
            <td><?= $deuda->has('deudore') ? $this->Html->link($deuda->deudore->presentacionSimple , ['controller' => 'Deudores', 'action' => 'view', $deuda->deudore->Id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cartera') ?></th>
            <td><?= $deuda->has('cartera') ? $this->Html->link($deuda->cartera->descripcion, ['controller' => 'Carteras', 'action' => 'view', $deuda->cartera->Id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Producto') ?></th>
            <td><?= h($deuda->producto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Número producto') ?></th>
            <td><?= h($deuda->numero_producto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>

            <td>
                <?= $deuda->has('estados_deuda') ? h($deuda->estados_deuda->descripcion) : '' ?>
            </td>

        </tr>
        <tr>
            <th scope="row"><?= __('Operador asignado') ?></th>
            <td>
                <?= $deuda->has('user') ? $this->Html->link($deuda->user->presentacion, ['controller' => 'Users', 'action' => 'view', $deuda->user->id]) : '' ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Capital Inicial') ?></th>
            <td><?= $this->Number->format($deuda->capital_inicial) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total') ?></th>
            <td><?= $this->Number->format($deuda->total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creado') ?></th>
            <td><?= h($deuda->created->nice()) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($deuda->modified->nice()) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Mora') ?></th>
            <td><?= h($deuda->fecha_mora) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dias Mora') ?></th>
            <td><?= h($deuda->dias_mora) ?></td>
        </tr>
        <tr>
         <div>
               <?= $this->Html->link(__('Editar'), ['controller' => 'Deudas' ,'action' => 'edit', $deuda->Id],['class' => 'btn btn-sm btn-warning']) ?>
          </div>
        </tr>
    </table>

</div>
<div class="well">
  <div class="container">
      <div class="row justify-content-start">
           <div class="col-4">
               <h3> Gestiones </h3>
           </div>
           <div class="col-4">
               <?= $this->Html->link(__('Nueva'), ['controller' => 'DeudasGestiones' ,'action' => 'add', $deuda->Id],['class' => 'btn btn-sm btn-success']) ?>
          </div>
      </div>
    </div>
    <?php if (!empty($deuda->deudas_gestiones)): ?>
      <div class="table-responsive">
          <table class="table table-striped table-hover"  cellpadding="0" cellspacing="0">
            <tr>
<!--                <th scope="col"><?= __('Id') ?></th>-->
                <th scope="col"><?= __('Descripcion') ?></th>
<!--                <th scope="col"><?= __('Modificada') ?></th>-->
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>

            <?php foreach ($deuda->deudas_gestiones as $deudasGestiones): ?>
            <tr>
<!--                <td><?= h($deudasGestiones->Id) ?></td>-->
                <td><?= h($deudasGestiones->descripcion) ?></td>
<!--
                <?php if(!empty($deudasGestiones->modified)): ?>
                <td><?= h($deudasGestiones->modified->nice());?></td>
              <?php else : ?>
-->
<!--                  <td>Sin datos</td>-->
                <?php endif;?>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'DeudasGestiones', 'action' => 'view', $deudasGestiones->Id],['class' => 'btn btn-sm btn-info']) ?>
<!--                    <?= $this->Html->link(__('Editar'), ['controller' => 'DeudasGestiones', 'action' => 'edit', $deudasGestiones->Id],['class' => 'btn btn-sm btn-warning']) ?>-->
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
