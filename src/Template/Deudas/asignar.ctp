<div class="row">
    <div class="page-header">
    <h3>Asignación de deudas </h3>
    </div>
    <div class ="col-lg-12">
                <h4>Asignar a:</h4>
            </div> 
     <?= $this->Form->create($deudas) ?>   
    <div class="row"> 
            <div class ="col-lg-8">
                <?= $this->Form->input('usuario_id',['label' => '' , 'type'=> 'select', 'options' => $users, 'empty'=> true, ]); ?>
            </div>
            <div class ="col-lg-4 busqueda">
                <?= $this->Form->button('Asignar', [ 'controller' => 'Deudas', 'action' => 'asignar' , 'type' => 'submit']);?>
            </div>
    </div>

    <div class="table-responsive">
    <table class="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('deudor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cartera_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usuario_id', ['label'=>'Asignado a:']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('producto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numero_producto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('capital_inicial') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_mora') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dias_mora') ?></th>
                <th scope="col">
                     <?= $this->Form->checkbox("checkTodos",['id' => 'checkTodos', 'checked' => false ,'hiddenField' => false]);    ?>

                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($deudas as $deuda): ?>
            <tr>

                <td><?= $deuda->has('deudore') ? $this->Html->link($deuda->deudore->presentacionSimple, ['controller' => 'Deudores', 'action' => 'view', $deuda->deudore->Id]) : '' ?></td>
                <td><?= $deuda->has('cartera') ? $this->Html->link($deuda->cartera->descripcion, ['controller' => 'Carteras', 'action' => 'view', $deuda->cartera->Id]) : '' ?></td>
                 <td><?= $deuda->has('user') ? $this->Html->link($deuda->user->presentacion, ['controller' => 'Carteras', 'action' => 'view', $deuda->cartera->Id]) : '' ?></td>
                <td><?= h($deuda->producto) ?></td>
                <td><?= h($deuda->numero_producto) ?></td>
                <td><?= $this->Number->format($deuda->capital_inicial) ?></td>
                <td><?= $this->Number->format($deuda->total) ?></td>
                <td><?= h($deuda->fecha_mora->format('d-m-Y')) ?></td>
                <td><?= h($deuda->dias_mora) ?></td>
                <td><?= $this->Form->checkbox('',['name' => 'deudas[]' ,'label' => false ,'value' => $deuda->Id,'hiddenField' => false]) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <?= $this->Form->end() ?>
    <?= $this->element('footer') ?>
</div>
