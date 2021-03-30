<script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_placa() {
                // Limpa valores do formulário de cep.
                $("#model").val("");
                $("#brand").val("");
                $("#board").val(""); 
                $("#year").val(""); 
                $("#name").val(""); 
                $("#phone").val(""); 
                $("#mail").val("");  
            }
            
            //Quando o campo cep perde o foco.
            $("#board").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var placa = $(this).val().replace("-", "").toUpperCase();
               
                //Verifica se campo cep possui valor informado.
                if (placa != "") {
 

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#model").val("..."); 
                        $("#brand").val("..."); 
                        $("#year").val("..."); 
                        $("#name").val("..."); 
                        $("#mail").val("..."); 
                        $("#phone").val("...");  

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("<?php echo getenv('APP_HOST'); ?>/veiculo/buscar-placa/"+ placa +"", function(dados) {
                            console.log(dados);
                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#model").val(dados.model); 
                                $("#brand").val(dados.brand);
                                $("#year").val(dados.year); 
                                $("#name").val(dados.name); 
                                $("#phone").val(dados.phone); 
                                $("#mail").val(dados.mail);  
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_placa();
                                alert("Placa não encontrada.");
                            }
                        }); 
                     
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_placa();
                }
            });
        });

    </script>