<script>
    $(document).ready(function(){
      var maskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
      },
      options = {onKeyPress: function(val, e, field, options) {
              field.mask(maskBehavior.apply({}, arguments), options);
          }
      };
    $('#phone').mask(maskBehavior, options);
    var options = {
    onKeyPress: function (cpf, ev, el, op) {
        var masks = ['000.000.000-000', '00.000.000/0000-00'];
        $('#cpfcnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
    }
}

    $('#cpfcnpj').length > 11 ? $('#cpfcnpj').mask('00.000.000/0000-00', options) : $('#cpfcnpj').mask('000.000.000-00#', options);
    $("#zipcode").mask('00000-000');
    $("#board").mask('AAA-0000'); 
    });
    </script>