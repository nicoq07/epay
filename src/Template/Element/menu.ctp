<nav class="navbar navbar-inverse nav-users">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?= $this->Html->link('GYC', ['controller' => 'Users', 'action' => 'home'], ['class' => 'navbar-brand']) ?>

        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <?php if(isset($current_user)): ?>

                <ul class="nav navbar-nav">
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Clientes <span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <li>
                              <?=  $this->Html->link('Ver todos', ['controller' => 'Empresas', 'action' => 'index']) ?>
                            </li>
                              <li>
                              <?=  $this->Html->link('Agregar nuevo', ['controller' => 'Empresas', 'action' => 'add']) ?>
                            </li>
                          </ul>
                      </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Carteras <span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <li>
                              <?=  $this->Html->link('Ver todas', ['controller' => 'Carteras', 'action' => 'index']) ?>
                            </li>
                              <li>
                                <?=  $this->Html->link('Agregar nueva', ['controller' => 'Carteras', 'action' => 'add']) ?>
                            </li>
                            <li>
                              <?=  $this->Html->link('Importar excel', ['controller' => 'Carteras', 'action' => 'subir']) ?>
                          </li>
                          </ul>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Deudas <span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <li>
                                <?=  $this->Html->link('Listar deudas', ['controller' => 'Deudas', 'action' => 'index']) ?>
                            </li>
                              <li>
                                <?=  $this->Html->link('Asignar usuario', ['controller' => 'Deudas', 'action' => 'asignar']) ?>
                            </li>
                          </ul>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Deudores <span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <li>
                              <?=  $this->Html->link('Ver todos', ['controller' => 'Deudores', 'action' => 'index']) ?>
                            </li>
                              <li>
                            </li>
                          </ul>
                      </li>


                  </ul>


                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= $current_user['nombre'] ?><span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                              <?php if($current_user['role_id'] == 1): ?>
                              <li>
                                  <?=  $this->Html->link('Crear usuario', ['controller' => 'Users', 'action' => 'add']) ?>
                              </li>
                              <li>
                                  <?=  $this->Html->link('Listar usuarios', ['controller' => 'Users', 'action' => 'index']) ?>
                              </li>
                              <?php endif; ?>
                              <li>
                                <?= $this->Html->link('Salir', ['controller' => 'Users', 'action' => 'logout']) ?>
                              </li>
                          </ul>
                      </li>

                    </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>
