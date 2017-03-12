<div class="row">
    <div class="page-header">
    <h3>Gestiones</h3>
    </div>
    <div class="table-responsive">
    <table class="table table-striped table-hover" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('descripcion', ['label' => 'Descripción']) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified', ['label' => 'Ult. vez actualizada']) ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($deudasGestiones as $deudasGestione): ?>
                <tr>
                    <td><?= h($deudasGestione->descripcion) ?></td>
                    <td><?= h($deudasGestione->modified->format('d-m-Y')) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $deudasGestione->Id],['class' => 'btn btn-sm btn-info']) ?>
                        <!-- <?= $this->Html->link(__('Edit'), ['action' => 'edit', $deudasGestione->Id],['class' => 'btn btn-sm btn-warning']) ?> -->
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} de un total de {{count}}')]) ?></p>
        </div>
      </div>
</div>
