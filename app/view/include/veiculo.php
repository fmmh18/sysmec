<script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_placa() {
                // Limpa valores do formulário de cep.
                $("#model").val("");
                $("#brand").val("");
                $("#board").val(""); 
                $("#yer").val(""); 
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

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://apicarros.com/v1/consulta/"+ placa +"/json", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#model").val(dados.modelo); 
                                $("#brand").val(dados.marca);
                                $("#year").val(dados.ano); 
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