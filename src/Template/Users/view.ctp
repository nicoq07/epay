<div class="well">
    <br>
    <dl>
      <dt>Nombre y Apellido</dt>
      <dd>
          <?= $user->presentacion ?>
          &nbsp;
      </dd>
      <br>
        <dt>Correo</dt>
        <dd>
            <?= $user->email ?>
            &nbsp;
        </dd>
        <br>

        <dt>Activo</dt>
        <dd>
            <?= $user->active ? __('Si') : __('No'); ?>
            &nbsp;
        </dd>
        <br>

        <dt>Creado</dt>
        <dd>
            <?= $user->created->nice() ?>
            &nbsp;
        </dd>
        <br>

        <dt>Modificado</dt>
        <dd>
            <?= $user->modified->nice() ?>
            &nbsp;
        </dd>
    </dl>
</div>
