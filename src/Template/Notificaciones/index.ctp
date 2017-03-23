<div class="container-fluid">
    <div class="row">
		 <!-- <div class="col-md-3"> -->
        	 <!-- <div class="row chats-row">
                <div class="col-md-12">
                    <a href="#" class="list-group-item open-request">
                       <p>Name:  Matthew Townsen</p>
                       <p>Email:  mtownsen@teamsupport.com</p>
                       <p>Time:  2:47 PM</p>
                       <p>Message:  It's all broken</p>
                       <button class="btn btn-default">Accept</button>
                    </a>
                    <a href="#" class="list-group-item chat-request">Robert Johnson - Muroc Industries</a>
        	    </div>
                <div class="col-md-12">
                    <a href="#" class="list-group-item">Travis Pitts - TeamSupport</a>
                    <a href="#" class="list-group-item list-group-item-success">Heather Townsen - MyCCA</a>
                    <a href="#" class="list-group-item active">Eric Harrington - TeamSupport</a>
                </div>
        	 </div> -->
	 <!-- </div> -->
        <div class="col-md-12 current-chat">
            <div class="row chat-toolbar-row">
                <div class="col-sm-12">

                    <div class="btn-group chat-toolbar" role="group" aria-label="...">
                        <?=  $this->Html->link(' Nuevo mensaje', ['controller' => 'Notificaciones', 'action' => 'add'],['class' => 'btn btn-default ticket-option fa fa-pencil ']) ?>


                        <!-- <button id="chat-invite" class="btn btn-default ticket-option" type="button">
                          <i class="glyphicon glyphicon-plus"></i> Invite
                        </button>
                        <button id="chat-customer" class="btn btn-default ticket-option" type="button">
                          <i class="glyphicon glyphicon-user"></i> Open Customer
                        </button>
                        <button id="chat-create-ticket" class="btn btn-default ticket-option" type="button">
                          <i class="glyphicon glyphicon-pencil"></i> Create Ticket
                        </button>
                        <button id="chat-add-ticket" class="btn btn-default ticket-option" type="button">
                          <i class="glyphicon glyphicon-plus"></i> Add to Ticket
                        </button>
                        <button id="chat-open-ticket" class="btn btn-default ticket-option" type="button">
                          <i class="glyphicon glyphicon-open"></i> Open Ticket
                        </button> -->
                    </div>
                </div>
            </div>


            <div class="row current-chat-area">

                <div class="col-lg-12">
                      <ul class="media-list">
                          <?php foreach ($notificaciones as $mensaje) :  ?>
                        <li class="media">

                            <div class="media-body">
                                <div class="media">
                                    <div class="pull-left icono-mensaje" href="#">
                                       <!-- <img class="media-object img-circle " src="https://app.teamsupport.com/dc/1078/UserAvatar/1839999/48/1470773165634">
                                        <div class="media-object img-circle">-->
                                        <?= h($users[$mensaje->emisor]) ?>
                                     <!--  </div> -->
                                    </div>
                                    <div class="media-body">
                                        <?= h($mensaje->descripcion) ?>
                                        <br>
                                        <small class="text-muted">  <?="  " . h($mensaje->created->format('h:m a d-m-Y '))  ?></small>
                                        <hr>
                                    </div>
                                </div>
                            </div>

                        </li>
                          <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <!-- <div class="row current-chat-footer col-md-12">
            <div class="panel-footer">
                <div class="input-group">
                  <input type="text" class="form-control">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Enviar</button>
                  </span>
                </div>
                </div>
            </div> -->
		</div>
    <?= $this->element('footer') ?>
	</div>
</div>
