
<div class="row">
    <div class="page-header">
    
    <h3>Buscado por : <?= h($busqueda) ?></h3>
    </div>
    <div class="table-responsive">
    <table class="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('deudor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('producto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numero_producto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('capital_inicial') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total',['label' => 'Capital actualizado']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_mora') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado_id') ?></th>
                <th scope="col"><?= h('Gestiones') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            
            <?php if(!empty($deudas)): ?>
            <?php foreach ($deudas as $deuda): ?>
            <tr>
                <td><?=  $deuda->has('deudor_id') ? h($deuda->deudore->presentacionSimple) : '' ?> </td>
                <td><?= h($deuda->producto) ?></td>
                <td><?= h($deuda->numero_producto) ?></td>
                <td><?= $this->Number->format($deuda->capital_inicial,[
                                        'before' => '$',
                                        'locale' => 'es_Ar'
                                        ])  ?>
                </td>
                <td><?= $this->Number->format($deuda->total,[
                                        'before' => '$',
                                        'locale' => 'es_Ar'
                                        ])  ?>
                </td>
                <td><?= h($deuda->fecha_mora->format('d/m/Y')) ?></td>
                <td><?=  $deuda->has('estados_deuda') ? h($deuda->estados_deuda->descripcion) : '' ?> </td>
                <td>
                  <?= $this->Html->link(__('Nueva'), ['controller' => 'DeudasGestiones', 'action' => 'add', $deuda->Id],['class' => 'btn btn-sm btn-primary']) ?>
                  <?= $this->Html->link(__('Ver'), ['controller' => 'DeudasGestiones', 'action' => 'index', $deuda->Id],['class' => 'btn btn-sm btn-info']) ?>
                </td>
                
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $deuda->Id],['class' => 'btn btn-sm btn-success']) ?>
<!--                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $deuda->Id],['class' => 'btn btn-sm btn-warning']) ?>-->
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    </div>
    <?= $this->element('footer') ?>
</div>
