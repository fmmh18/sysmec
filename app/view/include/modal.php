<div class="modal fade" id="modal_budget_<?php echo $data->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-file-alt"></i> Orçamento Nº <?php echo str_pad($data->id,4,"0",STR_PAD_LEFT); ?>/<?php echo date('Y',strtotime($data->date_entry)); ?></h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 text-right"><b>Data do orçamento:</b> <?php echo date('d/m/Y H:i:s',strtotime($data->date_entry)); ?></div>
          </div>
          <div class="row">
              <div class="col-md-3"><b>Nome do cliente</b></div>
              <div class="col-md-3"><b>CPF/CNPJ</b></div>
              <div class="col-md-3"><b>E-mail</b></div>
              <div class="col-md-3"><b>Telefone</b></div>
          </div>
          <div class="row">
              <?php 
                foreach($users as $user): 
                  if($user->id == $data->id_user):
              ?>
              <div class="col-md-3"><?php echo $user->name; ?></div>
              <div class="col-md-3"><?php echo $user->cpfcnpj; ?></div>
              <div class="col-md-3"><?php echo $user->mail; ?></div>
              <div class="col-md-3"><?php echo $user->phone; ?></div>
              <?php
                  endif;
                endforeach;
              ?>
          </div>
          <div class="row">
              <div class="col-md-3"><b>Placa</b></div>
              <div class="col-md-3"><b>Modelo</b></div>
              <div class="col-md-3"><b>Marca</b></div>
              <div class="col-md-3"><b>Ano</b></div>
          </div>
          <div class="row">
              <?php 
                foreach($vehicles as $vehicle): 
                  if($vehicle->id == $data->id_vehicle):
              ?>
              <div class="col-md-3"><?php echo $vehicle->board; ?></div>
              <div class="col-md-3"><?php echo $vehicle->model; ?></div>
              <div class="col-md-3"><?php echo $vehicle->brand; ?></div>
              <div class="col-md-3"><?php echo $vehicle->year; ?></div>
              <?php
                  endif;
                endforeach;
              ?>
          </div>
          <div class="row">
              <div class="col-md-3"><b>Nome</b></div>
              <div class="col-md-3"><b>Quantidade</b></div>
              <div class="col-md-3"><b>Vlr. unitário</b></div>
              <div class="col-md-3"><b>Vlr. Total</b></div>
          </div>
          <?php  
            foreach($parts as $part):
            if($part->id_budget == $data->id):  
          ?>
          <div class="row">
              <div class="col-md-3"><?php echo $part->parts; ?></div>
              <div class="col-md-3"><?php echo $part->amount; ?></div>
              <div class="col-md-3">R$ <?php echo $part->value_unitary; ?></div>
              <div class="col-md-3">R$ <?php echo $part->value_total_pieces; ?></div>
          </div>
          <?php 
            endif;
            
            endforeach; ?>
            <div class="row">
              <div class="col-md-9 text-right"><b>Total</b></div>
              <div class="col-md-3"><b>R$ <?php echo $data->total; ?></b></div>

            </div>
          </div>
        </div>    
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Fechar</button> 
      </div>
    </div>
  </div>
</div> 