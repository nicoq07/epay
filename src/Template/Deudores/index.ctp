    <div class="row">
        <div class="page-header">
            <h3>Deudores</h3>
        </div>
        <div>
            <?= $this->element('search') ?>
        </div>
        <div class="table-responsive">
        <table class="table table-striped table-hover" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
<!--                    <th scope="col"><?= $this->Paginator->sort('Id') ?></th>-->
<!--                    <th scope="col"><?= $this->Paginator->sort('calificacion') ?></th>-->
<!--                    <th scope="col"><?= $this->Paginator->sort('active') ?></th>-->
<!--                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>-->
                     <th scope="col"><?= $this->Paginator->sort('nombre',['label' => 'Nombre y Apellido']) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('dni',['label' => 'DNI']) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified', ['label' => 'Última vez modificado']) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('direccion', ['label' => 'Domicilio']) ?></th>
                    <th scope="col" class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($deudores as $deudore): ?>
                <tr>
<!--                    <td><?= $this->Number->format($deudore->Id) ?></td>-->
<!--                    <td><?= h($deudore->calificacion) ?></td>-->
<!--                    <td><?= h($deudore->active) ?></td>-->
<!--                    <td><?= h($deudore->created->format('d-m-Y')) ?></td>-->
                    <td><?= h($deudore->nombre) ?></td>
                    <td><?= $this->Number->format($deudore->dni,[
                                          'locale' => 'es_Ar',
                                          ]) ?></td>
                    <td><?= h($deudore->modified->format('d-m-Y')) ?></td>
                    <td><?= h($deudore->direccion) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $deudore->Id],['label' => 'Ver', 'class' => 'btn btn-sm btn-info']) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $deudore->Id],['label' => 'Editar', 'class' => 'btn btn-sm btn-warning']) ?>
                        <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $deudore->Id], ['label' => 'Eliminar', 'class' => 'btn btn-sm btn-danger','confirm' => __('Borrar al deudor {0}?', $deudore->presentacionSimple)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $this->element('footer') ?>
    </div>
