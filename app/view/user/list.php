<?php include __DIR__."/../include/header.php"; ?>
<div class="d-flex" id="wrapper">
<?php include __DIR__."/../include/sidemenu.php"; ?>
  <div id="page-content-wrapper">
    <nav class="navbar navbar-light bg-light text-white text-center">
        <button class="btn btn-outline-secondary text-white" id="menu-toggle"> <span class="navbar-toggler-icon"></span></button>
        <div class="col-md-10 text-center"><img src="<?php echo getenv('APP_HOST'); ?>/assets/media/logo/sysmec-56.png" class="mx-auto img-fluid"></div>
    </nav>
    <div class="col-md-12">
        <h2><i class="fas fa-users"></i> Lista de Usuários</h2>
        <hr>
        <div class="col-md-12 text-right">
        <a href="usuario/adicionar" class="btn btn-primary" style="margin-bottom:8px"><i class="fas fa-plus-circle"></i> Cadastrar</a>
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td><b>#</b></td>
                    <td><b>Nome</b></td>
                    <td><b>E-mail</b></td>
                    <td><b>Telefone</b></td> 
                    <td><b>Perfil</b></td>
                    <td><b>Status</b></td>
                    <td colspan="2" class="text-center"><b>Ações</b></td>
                </tr>
                <?php 
                if (count($datas) > 0) {
                    foreach ($datas as $data): ?>
                <tbody>
                <tr>
                    <td><?php echo $data->id; ?></td>
                    <td><?php echo $data->name; ?></td>
                    <td><?php echo $data->mail; ?></td>
                    <td><?php echo $data->phone; ?></td> 
                    <td class="text-center">
                        <?php echo $levels[$data->level]; ?>
                    </td>
                    <input type="hidden" id="user_id_<?php echo $data->id; ?>" value="<?php echo $data->id; ?>"/>
                    <td class="text-center">
                    <input type="hidden" id="user_name_<?php echo $data->id; ?>" value="<?php echo $data->name; ?>"/>
                    
                    <input type="hidden" id="status_<?php echo $data->id; ?>" value="<?php echo $data->status; ?>"/>
                    <i class="fas fa-circle" id="button_status_<?php echo $data->id; ?>"></i></td>
                    <td class="text-center" colspan="2"><a href="usuario/editar/<?php echo $data->id; ?>" class="btn btn-info" ><i class="fas fa-edit"></i></a>&nbsp; <a href="#" id="button_deletar_user_<?php echo $data->id; ?>" class="btn btn-danger" ><i class="far fa-trash-alt" ></i></a></td>
                </tr>
                </tbody>
                <script>
                    $(document).ready(function(){  
                        var user_id = <?php echo $data->id; ?>;
                        if($("#status_"+user_id).val() == 1){
                                $("#button_status_"+user_id).css("color","green")
                            }else{
                                $("#button_status_"+user_id).css("color","red")
                            }
                    

                        $("#button_status_"+user_id).click(function(){
                            if($("#status_"+user_id).val() == 1){
                                $("#status_"+user_id).val(0);
                                $("#button_status_"+user_id).css("color","red")
                            }else {
                                $("#status_"+user_id).val(1);
                                $("#button_status_"+user_id).css("color","green")
                            } 
                            $.post("<?php echo getenv('APP_HOST'); ?>/usuario/alterar-status",
                            {
                                status: $("#status_"+user_id).val() ,
                                id: $("#user_id_"+user_id).val() 
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
                    $("#button_deletar_user_"+user_id).click(function(){
                         
                        $.confirm({
                            title: 'Excluir usuário!',
                            content: 'Deseja excluir o usuário '+$("#user_name_"+user_id).val()+'!',
                            buttons: {
                                confirm: function () {
                                    $.post("<?php echo getenv('APP_HOST'); ?>/usuario/alterar-status",
                                    {
                                        status: $("#status_"+user_id).val() ,
                                        id: $("#user_id_"+user_id).val() 
                                    },
                                    function(data, status){ 
                                    if(data == 1 && status == "success"){
                                        if($("#status_"+user_id).val() == 1){
                                            $("#status_"+user_id).val(0);
                                            $("#button_status_"+user_id).css("color","red")
                                        }else{
                                            $("#status_"+user_id).val(1);
                                            $("#button_status_"+user_id).css("color","green")
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
                <?php endforeach;
                }else{
                ?>
                <tbody>
                    <tr>
                        <td colspan="8" class="text-center"><h4>Não possui registro.</h4></td>
                    </tr>
                </tbody>
                <?php } ?>
            </thead>
        </table>
    </div> 
  </div>
</div>
<?php include __DIR__."/../include/footer.php"; ?> 
