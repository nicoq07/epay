<div class="row">
    <?= $this->element('volverAtras') ?>
    <div class="page-header">
        <h3>Deudor: </h3>
    </div>
    <div class="table-responsive">
    <table class="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>

                <th scope="col"><?= h('Id') ?></th>
                <th scope="col"><?= h('Nombre y Apellido') ?></th>
                <th scope="col"><?= h('dni') ?></th>
                <th scope="col"><?= h('Calificacion') ?></th>
                <!-- <th scope="col"><?= h('active') ?></th> -->
                <th scope="col"><?= h('Creado') ?></th>
                <th scope="col"><?= h('Modificado') ?></th>
                <th scope="col"><?= h('Dirección') ?></th>

                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>

                <?php if (!empty($deudore)){   ?>

                <td><?= $this->Number->format($deudore->Id) ?></td>
                <td><?= h($deudore->nombre) ?></td>
                <td><?= $this->Number->format($deudore->dni,[
                                      'locale' => 'es_Ar',
                                      ]) ?></td>
                <td><?= h($deudore->calificacion) ?></td>
                <!-- <td><?= h($deudore->active) ?></td> -->
                <td><?= h($deudore->created->format('d/m/Y')) ?></td>
                <td><?= h($deudore->modified->format('d/m/Y')) ?></td>
                <td><?= h($deudore->direccion) ?></td>


                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $deudore->Id],['label' => 'Ver', 'class' => 'btn btn-sm btn-info']) ?>
                    <!-- <?= $this->Html->link(__('Edit'), ['action' => 'edit', $deudore->Id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $deudore->Id], ['confirm' => __('Are you sure you want to delete # {0}?', $deudore->Id)]) ?> -->
                </td>
                <?php } ?>
            </tr>
        </tbody>
    </table>
</div>
