<?php include __DIR__."/../include/header.php"; ?>
<div class="d-flex" id="wrapper">
<?php include __DIR__."/../include/sidemenu.php"; ?>
  <div id="page-content-wrapper">
    <nav class="navbar navbar-light bg-light text-white text-center">
        <button class="btn btn-outline-secondary text-white" id="menu-toggle"> <span class="navbar-toggler-icon"></span></button>
        <div class="col-md-10 text-center"><img src="<?php echo getenv('APP_HOST'); ?>/assets/media/logo/sysmec-56.png" class="mx-auto img-fluid"></div>
    </nav>
    <div class="col-md-12">
        <h2>Lista de Orçamentos</h2>
        <hr>
        <div class="col-md-12 text-right <?php if($_SESSION["uLevel"] == 3){ echo 'd-none'; } ?>">
        <a href="orcamento/adicionar" class="btn btn-primary" style="margin-bottom:8px"><i class="fas fa-plus-circle"></i> Cadastrar</a>
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td><b>#</b></td>
                    <td><b>Data entrada</b></td>
                    <td><b>Veiculo</b></td>
                    <td><b>Total</b></td> 
                    <td colspan="2" class="text-center"><b>Ações</b></td>
                </tr>
                <?php foreach($datas as $data): ?>
                <tbody>
                <tr>
                    <td><?php echo $data->id; ?></td>
                    <td><?php echo date('d/m/Y H:i:s',strtotime($data->data_entrada)); ?></td>
                    <td><?php echo $data->id_veiculo; ?></td>
                    <td><?php echo $data->total; ?></td> 
                    <input type="hidden" id="budget_id_<?php echo $data->id; ?>" value="<?php echo $data->id; ?>"/>
                    <td class="text-center">
                    <input type="hidden" id="status_<?php echo $data->id; ?>" value="<?php echo $data->status; ?>"/>
                    <i class="fas fa-circle" <?php if($_SESSION["uLevel"] == 1){ echo 'id="button_status_'.$data->id.'"';} ?>  ></i></td>
                    <td class="text-center" colspan="2"><a href="orcamento/editar/<?php echo $data->id; ?>"  <?php if($_SESSION["uLevel"] == 3){ echo "style='display:none'"; } ?> ><i class="fas fa-edit"></i></a>&nbsp; <i class="far fa-trash-alt" id="button_deletar_budget_<?php echo $data->id; ?>"  <?php if($_SESSION["uLevel"] == 3 || $_SESSION["uLevel"] == 2){ echo "style='display:none'"; } ?>></i></td>
                </tr>
                </tbody>
                <script>
                    $(document).ready(function(){  
                        var budget_id = <?php echo $data->id; ?>;
                        if($("#status_"+budget_id).val() == 1){
                                $("#button_status_"+budget_id).css("color","green")
                            }else{
                                $("#button_status_"+budget_id).css("color","red")
                            }
                    

                        $("#button_status_"+budget_id).click(function(){
                            if($("#status_"+budget_id).val() == 1){
                                $("#status_"+budget_id).val(0);
                                $("#button_status_"+budget_id).css("color","red")
                            }else {
                                $("#status_"+budget_id).val(1);
                                $("#button_status_"+budget_id).css("color","green")
                            } 
                            $.post("<?php echo getenv('APP_HOST'); ?>/orcamento/alterar-status",
                            {
                                status: $("#status_"+budget_id).val() ,
                                id: $("#budget_id_"+budget_id).val() 
                            },
                            function(data, status){ 
                                if(data == 1 && status == "success"){
                                    toastr.success("Alterado o status.","Sucesso");
                                }else{
                                    toastr.error("Erro ao alterar o status.","Erro");
                                }
                            });
                    }); 

                    //Deletar
                    $("#button_deletar_budget_"+budget_id).click(function(){
                         
                        $.confirm({
                            title: 'Excluir orçamento!',
                            content: 'Deseja excluir o orçamento '+$("#budget_id_"+budget_id).val()+'!',
                            buttons: {
                                confirm: function () {
                                    $.post("<?php echo getenv('APP_HOST'); ?>/orcamento/alterar-status",
                                    {
                                        status: $("#status_"+budget_id).val() ,
                                        id: $("#budget_id_"+budget_id).val() 
                                    },
                                    function(data, status){ 
                                    if(data == 1 && status == "success"){
                                        if($("#status_"+budget_id).val() == 1){
                                            $("#status_"+budget_id).val(0);
                                            $("#button_status_"+budget_id).css("color","red")
                                        }else{
                                            $("#status_"+budget_id).val(1);
                                            $("#button_status_"+budget_id).css("color","green")
                                        } 
                                        toastr.success("Excluído com sucesso.","Sucesso");
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
                <?php endforeach; ?>
            </thead>
        </table>
    </div> 
  </div>
</div>
<?php include __DIR__."/../include/footer.php"; ?> 
