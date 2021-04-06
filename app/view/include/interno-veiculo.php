<script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulario_placa() {
                // Limpa valores do formulário de cep.
                $("#model").val("");
                $("#brand").val("");
                $("#board").val(""); 
                $("#year").val(""); 
                $("#name").val(""); 
                $("#phone").val(""); 
                $("#mail").val("");  
                $("#id_vehicle").val("");
                $("#id_user").val("");   
                
            }
            
            //Quando o campo cep perde o foco.
            $("#board").blur(function() {

                //Nova variável "Placa" somente com dígitos.
                var placa = $(this).val().replace("-", "").toUpperCase();
               
                //Verifica se campo Placa possui valor informado.
                if (placa != "") {
 

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#model").val("..."); 
                        $("#brand").val("..."); 
                        $("#year").val("..."); 
                        $("#name").val("..."); 
                        $("#mail").val("..."); 
                        $("#phone").val("..."); 
                        $("#id_vehicle").val("...");  
                        $("#id_user").val("...");   
 
                        $.getJSON("<?php echo getenv('APP_HOST'); ?>/veiculo/buscar-placa/"+ placa , function(dados) {
                                console.log(dados);
                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#model").val(dados.model); 
                                $("#brand").val(dados.brand);
                                $("#year").val(dados.year); 
                                $("#name").val(dados.name); 
                                $("#phone").val(dados.phone); 
                                $("#mail").val(dados.mail);  
                                $("#id_vehicle").val(dados.id_vehicle);  
                                $("#id_user").val(dados.id_user);  
                            } else {
                                //Placa pesquisado não foi encontrado.
                                limpa_formulario_placa();
                                toastr.error("Placa não encontrada.","Erro");
                            }
                        }); 
                     
                } else {
                    //Placa sem valor, limpa formulário.
                    limpa_formulario_placa();
                    toastr.error("Placa não inválida.","Erro");
                }
            });
        });

    </script>