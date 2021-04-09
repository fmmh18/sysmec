<?php include __DIR__."/include/header.php"; ?>
<div class="d-flex" id="wrapper">
<?php include __DIR__."/include/sidemenu.php"; ?>
  <div id="page-content-wrapper">
    <nav class="navbar navbar-light bg-light text-white text-center">
        <button class="btn btn-outline-secondary text-white" id="menu-toggle"> <span class="navbar-toggler-icon"></span></button>
        <div class="col-md-10 text-center"><img src="<?php echo getenv('APP_HOST'); ?>/assets/media/logo/sysmec-56.png" class="mx-auto img-fluid"></div>
    </nav> 
    <div class="container mt-2">
      <div class="row">
        <div class="col-md-12">
          <h3><i class="fab fa-dashcube"></i> Dashboard</h3>
          <hr>
        </div>
      </div>
      <div class="row ml-3">
        <div class="col-md-2 href mr-3 p-4 <?php if($_SESSION["uLevel"] == 3){ echo "d-none"; }?> btn btn-info" id="usuario" style="height:140px" ><i class="fas fa-users fa-4x"></i><h4>Usuários</h4></div>
        <div class="col-md-2 href mr-3 p-4 <?php if($_SESSION["uLevel"] == 3){ echo "d-none"; }?> btn btn-info" id="orcamento" style="height:140px" ><i class="fas fa-file-alt fa-4x"></i><h4>Orçamentos</h4></div>
        <div class="col-md-2 href p-4 <?php if($_SESSION["uLevel"] == 3){ echo "d-none"; }?> btn btn-info" id="veiculo" style="height:140px" ><i class="fas fa-car fa-4x"></i><h4>Veículos</h4></div>
      </div>
    </div>
  </div>
</div>
<?php include __DIR__."/include/footer.php"; ?> 
<script type="text/javascript" >
  $(document).ready(function() {
    $(".href").click(function(){
      var page = $(this).attr("id");
      var url = '<?php echo getenv("APP_HOST"); ?>';
      $(location).attr('href', url+"/"+page); // Using this
    
    }); 
  });
</script>