<script>
$(document).ready(function() {
  $('#value_unitary0').focusout(function(){
    var valor_total0 = $('#value_unitary0').val().replace(',','.')  * $('#qtd_part0').val();
       $('#value_tot_part0').val(valor_total0.toLocaleString('pt-br', {minimumFractionDigits: 2}).replace(',','.'));
    
  });
  var max_fields = 100; //maximum input boxes allowed 
  var x = 1; //initlal text box count

  $("#add_part").click(function(e) { //on add input button click
    e.preventDefault(); 

    if (x < max_fields) { //max input box allowed 
      var column = '<tr class="remove_part'+x+'">';
      column += '<td>';
      column += '<input type="text" name="name_part[]"  placeholder="nome" class="form-control">';
      column += '</td>';
      column += '<td>';
      column += '<input type="text" name="qtd_part[]" id="qtde_part'+x+'" placeholder="quantidade" onkeydown="$(this.value)" class="form-control qtd_part" >';
      column += '</td>';
      column += '<td>';
      column += '<input type="text" name="value_unitary[]" id="val_unitary'+x+'"  placeholder="vlr. unitário" onkeydown="$(this.value)"  class="form-control value_unitary">';
      column += '</td>';
      column += '<td>';
      column += '<input type="text" name="value_tot_part[]" readonly id="val_tot_part'+x+'"  placeholder="vlr. total" class="form-control">';
      column += '</td>';
      column += '<td><span class="btn btn-warning remove_piece" id="remove_part'+x+'"><i class="far fa-trash-alt"></i></span>'; 
      column += '</td>';
      column += '</tr>';
      $('#piece').append(column); //add input box
      x++; //text box increment
     } 
  });   
  
  $('#piece').on("click",".remove_piece",function(e) {
		e.preventDefault();
		//tr id will be the same as the image
		var tr = $(this).attr('id');
		//console.log('remove: ' + tr);
		$('#piece tr.'+ tr).remove();
		x--;
	});

});

</script>