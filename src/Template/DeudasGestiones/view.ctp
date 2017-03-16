<div class="well">
    <?= $this->element('volverAtras') ?>
<div class="deudasGestiones view large-9 medium-8 columns content">
    <h3><?= h($deudasGestione->deuda->producto .', numero : ' .$deudasGestione->deuda->numero_producto ) ?></h3>
    <table class="table table-striped table-hover" cellpadding="0" cellspacing="0">
<!--
        <tr>
            <th scope="row"><?= __('Deuda') ?></th>
            <td><?= $deudasGestione->has('deuda') ? $this->Html->link($deudasGestione->deuda->Id, ['controller' => 'Deudas', 'action' => 'view', $deudasGestione->deuda->Id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($deudasGestione->Id) ?></td>
        </tr>
-->
    </table>
    <div >
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($deudasGestione->descripcion)); ?>
    </div>
</div>
</div>
