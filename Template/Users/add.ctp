

<div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<div class="page-header">
        <h2> Crear usuario </h2>
      </div>
        <?= $this->Form->create($user, ['novalidate']) ?>
        <fieldset>
            <?php
                echo $this->Form->input('nombre');
                echo $this->Form->input('apellido');
                echo $this->Form->input('email');
                echo $this->Form->input('password');
                echo $this->Form->input('role_id', ['options' => $roles]);
                echo $this->Form->input('active');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Crear')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
