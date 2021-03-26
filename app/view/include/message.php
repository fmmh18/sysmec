<?php if(!empty($data['message'])){ ?>
 <?php if($data['message'] == 'sucesso'){ ?>
 <script> 
    toastr.success(<?php echo '"'.$message.'"'; ?>,<?php echo '"'.$message_title.'"'; ?>); 
</script> 
<?php }elseif($data['message'] == 'erro-login'){ ?>
 <script> 
    toastr.error(<?php echo '"'.$message.'"'; ?>,<?php echo '"'.$message_title.'"'; ?>); 
</script> 
<?php }elseif($data['message'] == 'arquivo-invalido'){ ?>
 <script> 
    toastr.error(<?php echo '"'.$message.'"'; ?>,<?php echo '"'.$message_title.'"'; ?>); 
</script> 
<?php }elseif($data['message'] == 'erro-cpf-cnpj'){ ?>
 <script> 
    toastr.error(<?php echo '"'.$message.'"'; ?>,<?php echo '"'.$message_title.'"'; ?>); 
</script>  
<?php }elseif($data['message'] == 'usuario-nao-logado'){ ?>
 <script> 
    toastr.error(<?php echo '"'.$message.'"'; ?>,<?php echo '"'.$message_title.'"'; ?>);  
</script> 
<?php } ?> 
<?php } ?>