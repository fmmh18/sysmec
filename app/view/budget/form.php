<?php include __DIR__."/../include/header.php"; ?>
<div class="d-flex" id="wrapper">
<?php include __DIR__."/../include/sidemenu.php"; ?>
  <div id="page-content-wrapper">
    <nav class="navbar navbar-light bg-light text-white text-center">
        <button class="btn btn-outline-secondary text-white" id="menu-toggle"> <span class="navbar-toggler-icon"></span></button>
        <div class="col-md-10 text-center"><img src="<?php echo getenv('APP_HOST'); ?>/assets/media/logo/sysmec-56.png" class="mx-auto img-fluid"></div>
    </nav> 
    <div class="col-md-12">
    <h2><i class="fas fa-file-alt"></i> <?php echo $subtitle; ?> Orçamento</h2>
        <hr>
        <form action="<?php echo getenv('APP_HOST').$hidden_action; ?>" method="post">
        <input type="hidden" name="hidden_action" value="<?php echo $hidden_action; ?>">
        <input type="hidden" name="id" <?php if(!empty($row->id)){ echo "value='".$row->id."'"; } ?>>
        <input type="hidden" name="id_vehicle" id="id_vehicle" <?php if(!empty($row->id_vehicle)){ echo "value='".$vehicle[0]->id."'"; } ?>>
        <input type="hidden" name="id_user" id="id_user" <?php if(!empty($row->id_user)){ echo "value='".$user[0]->id."'"; } ?>>
        <input type="hidden" name="id_workshop" <?php if(!empty($row->id_user)){ echo "value='".$user[0]->id."'"; }else{ echo "value='".$_SESSION['uID']."'"; } ?> >
        
            <div class="row">
            <div class="col-md-2 ml-3"><b>Placa</b></div>
            <div class="col-md-4"><b>Marca</b></div>
            <div class="col-md-4"><b>Modelo</b></div>
            <div class="col-md-1"><b>Ano</b></div>
            </div>
            <div class="row">
            <div class="col-md-2 ml-3"><input type="text" class="form-control" name="board" id="board" style="text-transform: uppercase;" <?php if(!empty($row->id_vehicle)){ echo "value='".$vehicle[0]->board."'"; } ?> ></div>
            <div class="col-md-4"><input type="text" class="form-control" name="model" id="model" readonly <?php if(!empty($row->id_vehicle)){ echo "value='".$vehicle[0]->model."'"; } ?> ></div>
            <div class="col-md-4"><input type="text" class="form-control" name="brand" id="brand" readonly <?php if(!empty($row->id_vehicle)){ echo "value='".$vehicle[0]->brand."'"; } ?> ></div>
            <div class="col-md-1"><input type="text" class="form-control" name="year" id="year"  readonly <?php if(!empty($row->id_vehicle)){ echo "value='".$vehicle[0]->year."'"; } ?> ></div>
            </div>
            <div class="row">
            <div class="col-md-11 ml-3"><b>Proprietario</b></div>
            <div class="col-md-11 ml-3"><input type="text" class="form-control" name="name" id="name" readonly <?php if(!empty($row->id_user)){ echo "value='".$user[0]->name."'"; } ?> ></div>
            </div>
            <div class="row">
            <div class="col-md-6 ml-3"><b>E-mail</b></div>
            <div class="col-md-5"><b>Telefone</b></div>
            </div> 
            <div class="row">
            <div class="col-md-6 ml-3"><input type="text" class="form-control" name="mail" id="mail" readonly <?php if(!empty($row->id_user)){ echo "value='".$user[0]->mail."'"; } ?> ></div>
            <div class="col-md-5"><input type="text" class="form-control" name="phone" id="phone" readonly <?php if(!empty($row->id_user)){ echo "value='".$user[0]->phone."'"; } ?> ></div>
            </div>
            <div class="row">
            <div class="col-md-12 p-3"><h4>Peças</h4><hr></div>
            </div>
            <div class="row ml-2">
            <div class="col-md-11">
            <table class="table"> 
              <tbody>
                <tr>
                  <td class="border-0 w-50"><input type="text" id="name_part0" placeholder="nome" class="form-control"></td>
                  <td class="border-0"><input type="text" placeholder="quantidade" id="qtd_part0" class="form-control" ></td>
                  <td class="border-0"><input type="text" placeholder="vlr. unitário" id="value_unitary0" class="form-control money2"></td>
                  <td class="border-0"><input type="text" placeholder="vlr. total" readonly id="value_tot_part0" class="form-control money2"></td>
                  <td class="border-0"><a href="javascipt:void(0)" id="add_part" name="add_part" class="btn btn-info"><i class="fas fa-plus-circle"></i></a></td>
                </tr>
              </tbody>
            </table>
            </div>
            </div>
            <div class="row ml-3">
            <div class="col-md-11">
            <table class="table table-striped table-bordered" id="piece">
              <thead>
                <tr>
                  <th class="w-50"><b>Nome</b></th>
                  <th><b>Quantidade</b></th>
                  <th><b>Vlr. Unitário</b></th>
                  <th><b>Vlr. total</b></th>
                  <th><b>Excluir</b></th>
                </tr>
              </thead>
              <tbody>
                <?php
                if(!empty($parts)):
                  $old_value_total_pieces = 0;
                  foreach($parts as $part):
                    $old_value_total_pieces += $part->value_total_pieces;
                ?>
                <tr id="tr_part_<?php echo $part->id; ?>">
                <input type="hidden" id="part_<?php echo $part->id; ?>" value="<?php echo $part->id; ?>">
                <td class="w-50"><input type="text" id="name_part_<?php echo $part->id; ?>" placeholder="nome" value="<?php echo $part->parts; ?>" class="form-control"></td>
                  <td><input type="text" placeholder="quantidade" id="qtd_part_<?php echo $part->id; ?>" value="<?php echo $part->amount; ?>" class="form-control" ></td>
                  <td><input type="text" placeholder="vlr. unitário" id="value_unitary_<?php echo $part->id; ?>" value="<?php echo $part->value_unitary; ?>" class="form-control"></td>
                  <td><input type="text" placeholder="vlr. total" readonly id="value_tot_part_<?php echo $part->id; ?>" value="<?php echo $part->value_total_pieces; ?>" class="form-control"></td>
                  <td><a href="#" id="button_delete_part_<?php echo $part->id; ?>"  class="btn btn-warning"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
                <script>
                
                $(document).ready(function(){   
                  part_id = <?php echo $part->id; ?>;
                $("#button_delete_part_"+part_id).click(function(){
                  value_tot_decre = $("#value_tot_part_"+part_id).val();
                         
                         $.confirm({
                             title: 'Excluir a peça do orçamento?',
                             content: 'Deseja excluir o orçamento '+$("#name_part_"+part_id).val()+'!',
                             buttons: {
                                 confirm: function () {
                                     $.post("<?php echo getenv('APP_HOST'); ?>/orcamento/deletar-pecas",
                                     {
                                         status: 0 ,
                                         id: $("#part_"+part_id).val() 
                                     },
                                     function(data, status){ 
                                     if(data == 1 && status == "success"){ 
                                       //   console.log( $("#value_total_services").val() +"-"+ value_tot_decre);
                                          val_tot = $("#value_total_services").val() - value_tot_decre;
                                          //console.log(val_tot);
                                          $('#value_total_services').val(val_tot) ;
                                          toastr.success("Excluído com sucesso.","Sucesso");
                                          $("#tr_part_"+part_id).remove();
                                         }else{
                                             toastr.error("Erro ao excluir o status.","Erro");
                                         }
                                 });
                                 },
                                 cancel: function () {
                                     toastr.error("Ação cancelada pelo usuário.","Erro");
                                 } 
                             }
                         }); 
                    
                         });
                         });
                </script>
                <?php
                  endforeach;
                endif;
                ?>
             </tbody>
            </table>
            <div class="col-md-12">
            <table class="table"> 
              <tbody>
                <tr>
                  <td class="border-0 w-75 text-right" style="background-color:#ccc"><b>Total</b></td>
                  <td class="border-0" style="background-color:#ccc"><input type="text" name="value_total_services" class="form-control" readonly id="value_total_services" <?php if(!empty($old_value_total_pieces)){?>value="<?php echo $old_value_total_pieces; ?>"<?php }?> ></td>
                </tr>
              </tbody>
            </table>
            </div>
            </div>
             </div>
            <div class="col-md-12 p-3"><button type="submit" class="btn btn-lg btn-block btn-danger"><b><?php echo $button_action; ?></b></button></div>
            </form>
    </div>
  </div>
</div>
<?php include __DIR__."/../include/footer.php"; ?> 
<?php include __DIR__."/../include/interno-veiculo.php"; ?>
<?php include __DIR__."/../include/mask.php"; ?> 
<?php include __DIR__."/../include/message.php"; ?> 
<?php include __DIR__."/../include/campos.php"; ?> 