<div class="row">
    	<div class="page-header">
    		<h2>Editar usuario</h2>
    	</div>
    	<div class="table-responsive">
    		<table class="table table-striped table-hover">

</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <?php
          echo $this->Form->input('nombre');
          echo $this->Form->input('apellido');
            echo $this->Form->input('password');
            echo $this->Form->input('email');
            echo $this->Form->input('role_id', ['options' => $roles]);
//            echo $this->Form->input('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
