<script>
$(document).ready(function() {
  $('#value_unitary0').focusout(function(){
    var valor_total0 = $('#value_unitary0').val().replace(',','.')  * $('#qtd_part0').val();
       $('#value_tot_part0').val(valor_total0.toLocaleString('pt-br', {minimumFractionDigits: 2}).replace(',','.'));
    
  });
  var max_fields = 100; //maximum input boxes allowed
  var wrapper = $("#part"); //Fields wrapper
  var add_button = $("#add_part"); //Add button ID

  var x = 1; //initlal text box count
  $(add_button).click(function(e) { //on add input button click
    e.preventDefault(); 

    if (x < max_fields) { //max input box allowed 
      var column = '<div class="row" id="data-'+x+'">';
      column += '<div class="col-md-3 p-2 border">';
      column += '<input type="text" name="name_part[]"  placeholder="nome" class="form-control"></div>';
      column += '<div class="col-md-2 p-2 border">';
      column += '<input type="text" name="qtd_part[]" id="qtd_part'+x+'" placeholder="quantidade" class="form-control" ></div>';
      column += '<div class="col-md-3 p-2 border">';
      column += '<input type="text" name="value_unitary[]" id="value_unitary'+x+'"  placeholder="vlr. unitário"  class="form-control money2"></div>';
      column += '<div class="col-md-3 p-2 border">';
      column += '<input type="text" name="value_tot_part[]" readonly id="value_tot_part'+x+'"  placeholder="vlr. total" class="form-control"></div>';
      column += '<div class="col-md-1 p-2"><span class="btn btn-warning" id="remove_part"><i class="far fa-trash-alt"></i></span></div>'; 
      x++; //text box increment
      $(wrapper).append(column); //add input box
     } 
  });
  
  $('#value_unitary'+x).focusout(function(){  
    var valor_total = $('#value_unitary'+x).val().replace(',','.') * $('#qtd_part'+x).val();
    $('#value_tot_part'+x).val(valor_total.toLocaleString('pt-br', {minimumFractionDigits: 2}).replace(',','.'));
  });

  $(wrapper).on("click", "#remove_part", function(e) { //user click on remove text
    e.preventDefault(); 
    $('#data-'+x).remove();
    x--;
  })

});
</script>