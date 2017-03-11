<div class="page-header">
    <h3>Carteras</h3>
</div>
    <div class="table-responsive">
    <table class="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion', ['label' => 'Clientes']) ?></th>
                <th scope="col"><?= h('Total') ?></th>
                <th scope="col"><?= h('Capital Inicial') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active', ['label' => 'Activa']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', ['label' => 'Creada']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified', ['label' => 'Modificada']) ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($carteras as $cartera): ?>
              <?php
              $total = 0;
              $capIni = 0;
               foreach ($cartera->deudas as $deuda) {
                 $total =  $total + $deuda->total;
                 $capIni = $capIni + $deuda->capital_inicial;
              } ?>
            <tr>
                <td><?= h($cartera->descripcion) ?></td>
                <td><?= $cartera->has('empresa') ? $this->Html->link($cartera->empresa->descripcion, ['controller' => 'Empresas', 'action' => 'view', $cartera->empresa->Id]) : '' ?></td>
                  <td><?= $this->Number->format($total,[
                                        'before' => '$',
                                        'locale' => 'es_Ar'
                                        ]) ?></td>
                    <td><?= $this->Number->format($capIni,[
                                          'before' => '$',
                                          'locale' => 'es_Ar'
                                          ]) ?></td>
                <td><?= $cartera->active ? __('Si') : __('No'); ?></td>
                <td><?= h($cartera->created->format('d-m-Y')) ?></td>
                <td><?= h($cartera->modified->format('d-m-Y')) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $cartera->Id],['class' => 'btn btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $cartera->Id],['class' => 'btn btn-sm btn-primary']) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $cartera->Id], ['confirm' => 'Eliminar cartera ?', 'class' => 'btn btn-sm btn-danger']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->element('footer') ?>
</div>
