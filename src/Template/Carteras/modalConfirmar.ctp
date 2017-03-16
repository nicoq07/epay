<?php echo $this->Html->link('Lista', '#list', array(
                            'data-toggle' => 'modal',
                            'class' => 'btn btn-danger'
                        )); ?>


<div class="modal fade" id="list" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog" style="width: 80%">
        <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                 <h4 class="modal-title" id="myModalLabel">Título da modal</h4>
             </div>
             <div class="modal-body">
                         Conteúdo da Modal           
             </div>
         </div>
     </div>
</div>