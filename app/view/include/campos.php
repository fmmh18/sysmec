<script>
$(document).ready(function() {
  $('#value_unitary0').focusout(function(){
    var valor_total0 = $('#value_unitary0').val().replace(',','.')  * $('#qtd_part0').val();
       $('#value_tot_part0').val(valor_total0.toLocaleString('pt-br', {minimumFractionDigits: 2}).replace(',','.'));
    
  });
  var max_fields = 100; //maximum input boxes allowed 
  var x = 0; //initlal text box count

  $("#add_part").click(function(e) { //on add input button click
    e.preventDefault(); 
    value_tot = $('#value_tot_part0').val();
    value_unitary = $('#value_unitary0').val();
    qtd_part = $('#qtd_part0').val();
    name_part = $('#name_part0').val();
  
    if (x < max_fields) { //max input box allowed 
      var column = '<tr class="remove_part'+x+'">';
      column += '<td>';
      column += '<b>'+name_part+'</b><input type="hidden" name="product['+x+'][parts]"  value="'+name_part+'">';
      column += '</td>';
      column += '<td>';
      column += '<b>'+qtd_part+'</b><input type="hidden" name="product['+x+'][amount]"  value="'+qtd_part+'">';
      column += '</td>';
      column += '<td>';
      column += '<b>'+value_unitary+'</b><input type="hidden" name="product['+x+'][value_unitary]"  value="'+value_unitary+'">';
      column += '</td>';
      column += '<td>';
      column += '<b>'+value_tot+'</b><input type="hidden" name="product['+x+'][value_total_pieces]"  value="'+value_tot+'">';
      column += '</td>';
      column += '<td><span class="btn btn-warning remove_piece" id="remove_part'+x+'"><i class="far fa-trash-alt"></i></span>'; 
      column += '</td>';
      column += '</tr>';
      $('#piece').append(column); //add input box
      x++; //text box increment

      
    $('#value_tot_part0').val('');
    $('#value_unitary0').val('');
    $('#qtd_part0').val('');
    $('#name_part0').val('');
    $('#name_part0').focus();
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