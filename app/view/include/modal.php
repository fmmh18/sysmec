<div class="container-fluid">
<div class="modal fade" id="modal_budget_<?php echo $data->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-file-alt"></i> Orçamento Nº <?php echo str_pad($data->id,4,"0",STR_PAD_LEFT); ?>/<?php echo date('Y',strtotime($data->date_entry)); ?></h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table id="classModal" class="table table-striped">
                    <tr>
                      <td class="text-right"><b>Data do orçamento:</b> <?php echo date('d/m/Y H:i:s',strtotime($data->date_entry)); ?></td>
                    </tr>
                    <tr>
                      <td><b>Nome do cliente</b></td>
                      <td><b>CPF</b></td>
                      <td><b>E-mail</b></td>
                      <td><b>Telefone</b></td>
                    </tr>
                    <tr>
                      <td><?php echo $users[$data->id_user]->name; ?></td>
                      <td><?php echo $users[$data->id_user]->cpfcnpj; ?></td>
                      <td><?php echo $users[$data->id_user]->mail; ?></td>
                      <td><?php echo $users[$data->id_user]->phone; ?></td>
                    </tr>
                </table>   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
</div>