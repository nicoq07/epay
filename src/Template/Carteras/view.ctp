<div class="well">
    <div class="page-header">
        <h3><?= h($cartera->descripcion) ?></h3>    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover" cellpadding="0" cellspacing="0">

            <tr>
                <th scope="row"><?= __('Descripcion') ?></th>
                <td><?= h($cartera->descripcion) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Clientes') ?></th>
                <td><?= $cartera->has('empresa') ? $this->Html->link($cartera->empresa->descripcion, ['controller' => 'Empresas', 'action' => 'view', $cartera->empresa->Id]) : '' ?></td>
            </tr>
           
            <tr>
                <th scope="row"><?= __('Activa') ?></th>
                <td><?= $cartera->active ? __('Si') : __('No'); ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Creada') ?></th>
                <td><?= h($cartera->created->format('d-m-Y')) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modificada') ?></th>
                <td><?= h($cartera->modified->format('d-m-Y')) ?></td>
            </tr>
        </table>
    </div>
</div>
<div class="well">
   
      <?= $this->Html->link(__('Importar archivo'), ['controller' => 'Carteras', 'action' => 'subir', $cartera->Id],['class' => 'btn btn-sm btn-success']) ?>
    <?= $this->Html->link(__('Exportar resumen'), ['controller' => 'Carteras', 'action' => 'exportar', $cartera->Id],['class' => 'btn btn-sm btn-info']) ?>
            <h4><?= __('Deudas de la cartera') ?></h4>
            
       
        <?php if (!empty($cartera->deudas)): ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover" cellpadding="0" cellspacing="0">

                <tr>
                    <th scope="col"><?= __('Producto') ?></th>
                    <th scope="col"><?= __('Numero Producto') ?></th>
                    <th scope="col"><?= __('Capital Inicial') ?></th>
                    <th scope="col"><?= __('Total') ?></th>
                    <th scope="col"><?= __('Modificada') ?></th>
                    <th scope="col"><?= __('Fecha Mora') ?></th>
                    <th scope="col"><?= __('Dias Mora') ?></th>
                    <th scope="col" class="actions"><?= __('Acciones') ?></th>
                </tr>
                <?php foreach ($cartera->deudas as $deudas): ?>
                <tr>
                  
                    <td><?= h($deudas->producto) ?></td>     
                    <td><?= h($deudas->numero_producto) ?></td>
                    <td><?= $this->Number->format($deudas->capital_inicial,[
                                  'before' => '$',
                                  'locale' => 'es_Ar'
                                  ]) ?></td>
                    <td><?= $this->Number->format($deudas->total,[
                                  'before' => '$',
                                  'locale' => 'es_Ar'
                                  ]) ?></td>
                    <td><?= h($deudas->modified->format('d-m-Y')) ?></td>
                    <td><?= h($deudas->fecha_mora->format('d-m-Y')) ?></td>
                    <td><?= h($deudas->dias_mora) ?></td>
                    <td class="actions"> 
                        <?= $this->Html->link(__('Ver'), ['controller' => 'Deudas', 'action' => 'view', $deudas->Id],['class' => 'btn btn-sm btn-info']) ?>
                        <?= $this->Html->link(__('Editar'), ['controller' => 'Deudas', 'action' => 'edit', $deudas->Id],['class' => 'btn btn-sm btn-warning']) ?>
                    </td>
                </tr>
               <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
  
</div>
