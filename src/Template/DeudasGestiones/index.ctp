<div class="row well">
    <?= $this->element('volverAtras') ?>
    <div class="page-header">
    <h3>Gestiones</h3>
    </div>
    <div class="table-responsive">
    <table class="table table-striped table-hover" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('descripcion', ['label' => 'Descripción']) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created', ['Creada']) ?></th>
                    <th scope="col"><?= h("Deuda") ?></th>
                    <th scope="col" class="actions"><?= __('Actiones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($deudasGestiones as $deudasGestione): ?>
                <tr>
                    <td><?= h($deudasGestione->descripcion) ?></td>
                    <td><?= h($deudasGestione->created->format('d/m/Y')) ?></td>
                    <td>
                      <?= $this->Html->link(__('Ir'), ['controller' => 'Deudas'  , 'action' => 'view', $deudasGestione->deuda_id],['class' => 'btn btn-sm btn-success']) ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $deudasGestione->Id],['class' => 'btn btn-sm btn-info']) ?>
                        <!-- <?= $this->Html->link(__('Edit'), ['action' => 'edit', $deudasGestione->Id],['class' => 'btn btn-sm btn-warning']) ?> -->
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div>
       <?= $this->element('footer') ?>
        </div>
      </div>
</div>
