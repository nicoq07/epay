<div class="notificaciones form large-9 medium-8 columns content">
    <?= $this->Form->create($notificacione) ?>
    <fieldset>
        <legend><?= __('Enviar mensaje') ?></legend>
        <?php
            echo $this->Form->input('descripcion', ['label' => 'Mensaje' ]);
            // echo $this->Form->input('emisor', ['options' => $users]);
            echo $this->Form->input('receptor', ['options' => $users]);
            // echo $this->Form->input('leida');
             echo $this->Form->input('broadcast', ['label' => 'Enviar a todos' ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
