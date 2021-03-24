<?php if(!empty($data['message'])){ ?>
 <?php if($data['message'] == 'sucesso'){ ?>
 <script>

    $(document).ready(function(){  
    toastr.success(<?php echo '"'.$message.'"'; ?>,<?php echo '"'.$message_title.'"'; ?>);

    });
</script> 
<?php }  else if($data['message'] == 'erro-login'){ ?>
 <script>
    $(document).ready(function(){  
    toastr.error(<?php echo '"'.$message.'"'; ?>,<?php echo '"'.$message_title.'"'; ?>);

    });
</script> 
<?php }  else if($data['message'] == 'arquivo-invalido'){ ?>
 <script>
    $(document).ready(function(){  
    toastr.error(<?php echo '"'.$message.'"'; ?>,<?php echo '"'.$message_title.'"'; ?>);

    });
</script> 
<?php }  else if($data['message'] == 'erro-cpf-cnpj'){ ?>
 <script>
    $(document).ready(function(){  
    toastr.error(<?php echo '"'.$message.'"'; ?>,<?php echo '"'.$message_title.'"'; ?>);

    });
</script> 
<?php } ?> 
<?php } ?>