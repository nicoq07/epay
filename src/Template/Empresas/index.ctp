<div class="row">
    <div class="page-header">
         <h3><?= __('Clientes') ?></h3>
    </div>
    <div class="table-responsive">
    <table class="table table-striped table-hover" cellpadding="0" cellspacing="0">
   
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion' , ['label' => 'Nombre']) ?></th>
<!--                <th scope="col"><?= $this->Paginator->sort('created' , ['label' => 'Creado']) ?></th>-->
                <th scope="col"><?= $this->Paginator->sort('modified', ['label' => 'Modificado']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('cuit', ['label' => 'CUIT']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('direccion', ['label' => 'Dirección']) ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empresas as $empresa): ?>
            <tr>
                <td><?= $this->Number->format($empresa->Id) ?></td>
                <td><?= h($empresa->descripcion) ?></td>
<!--                <td><?= h($empresa->created) ?></td>-->
                <td><?= h($empresa->modified->format('d-m-Y')) ?></td>
                <td><?= h($empresa->cuit) ?></td>
                <td><?= h($empresa->direccion) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Nueva cartera'), ['controller' => 'Carteras', 'action' => 'add', $empresa->Id],['class' => 'btn btn-sm btn-success']) ?>
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $empresa->Id],['class' => 'btn btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $empresa->Id],['class' => 'btn btn-sm btn-warning']) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $empresa->Id], ['confirm' => __('Estás seguro de eliminar la empresa {0}?', $empresa->descripcion),'class' => 'btn btn-sm btn-danger']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->element('footer') ?>
</div>
</div>