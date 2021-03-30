<?php if(!empty($data['message'])){ ?>
 <?php if($data['message'] == 'sucesso'){ ?>
 <script> 
    toastr.success(<?php echo '"'.$message.'"'; ?>,<?php echo '"'.$message_title.'"'; ?>); 
</script> 
<?php }else{ ?>
 <script> 
    toastr.error(<?php echo '"'.$message.'"'; ?>,<?php echo '"'.$message_title.'"'; ?>); 
</script> 
<?php } ?> 
<?php } ?>