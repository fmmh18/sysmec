<?php include __DIR__."/../include/header.php"; ?>
<div class="d-flex" id="wrapper">
<?php include __DIR__."/../include/sidemenu.php"; ?>
  <div id="page-content-wrapper">
    <nav class="navbar navbar-light bg-light text-white text-center">
        <button class="btn btn-outline-secondary text-white" id="menu-toggle"> <span class="navbar-toggler-icon"></span></button>
        <div class="col-md-10 text-center"><img src="<?php echo getenv('APP_HOST'); ?>/assets/media/logo/sysmec-56.png" class="mx-auto img-fluid"></div>
    </nav> 
    <div class="col-md-12">
    <h2><?php echo $subtitle; ?> Veículo</h2>
        <hr>
        <form action="<?php echo getenv('APP_HOST').$hidden_action; ?>" method="post">
        <input type="hidden" name="hidden_action" value="<?php echo $hidden_action; ?>">
        <input type="hidden" name="id" <?php if(!empty($row[0]->id)){ echo "value='".$row[0]->id."'"; } ?>>
         <input type="hidden" name="id_relationship" value="<?php echo $row[0]->id_relationship; ?>"> 
            <div class="col-md-12"><b>Dono</b></div>
            <div class="col-md-12 p-2">
            <select name="user_id" class="form-control">
            <?php 
              foreach($user as $value):
                if($row[0]->user_id == $value->id):
                  echo "<option value='".$value->id."' selected>".$value->name."</option>";
                else:
                  echo "<option value='".$value->id."' >".$value->name."</option>";
                endif;
              endforeach; 
            ?>
            </select>
            </div>
            <div class="col-md-12"><b>Placa</b></div>
            <div class="col-md-12 p-2"><input type="text" class="form-control" name="board" id="board" style="text-transform: uppercase;" <?php if(!empty($row[0]->board)){ echo "value='".$row[0]->board."'"; } ?> ></div>
            <div class="col-md-12"><b>Modelo</b></div>
            <div class="col-md-12 p-2"><input type="text" class="form-control" name="model" id="model" <?php if(!empty($row[0]->model)){ echo "value='".$row[0]->model."'"; } ?>></div>
            <div class="col-md-12"><b>Marca</b></div>
            <div class="col-md-12 p-2"><input type="text" class="form-control" name="brand" id="brand" <?php if(!empty($row[0]->brand)){ echo "value='".$row[0]->brand."'"; } ?>></div>
            <div class="col-md-12"><b>Ano</b></div>
            <div class="col-md-12 p-2"><input type="text" readonly class="form-control" readonly name="year" id="year" <?php if(!empty($row[0]->year)){ echo "value='".$row[0]->year."'"; } ?>></div>
            <div class="col-md-12 p-3"><button type="submit" class="btn btn-lg btn-block btn-danger"><b><?php echo $button_action; ?></b></button></div>
        </form>
    </div>
  </div>
</div>
<?php include __DIR__."/../include/footer.php"; ?> 
<?php include __DIR__."/../include/veiculo.php"; ?>
<?php include __DIR__."/../include/mask.php"; ?> 
<?php include __DIR__."/../include/message.php"; ?> 