<?php include __DIR__."/../include/header.php"; ?>
<div class="d-flex" id="wrapper">
<?php include __DIR__."/../include/sidemenu.php"; ?>
  <div id="page-content-wrapper">
    <nav class="navbar navbar-light bg-light text-white text-center">
        <button class="btn btn-outline-secondary text-white" id="menu-toggle"> <span class="navbar-toggler-icon"></span></button>
        <div class="col-md-10 text-center"><img src="<?php echo getenv('APP_HOST'); ?>/assets/media/logo/sysmec-56.png" class="mx-auto img-fluid"></div>
    </nav> 
    <div class="col-md-12">
    <h2><?php echo $subtitle; ?> Orçamento</h2>
        <hr>
        <form action="<?php echo getenv('APP_HOST').$hidden_action; ?>" method="post">
        <input type="hidden" name="hidden_action" value="<?php echo $hidden_action; ?>">
        <input type="hidden" name="id" value="<?php echo $row->id; ?>">
            <div class="row">
            <div class="col-md-2 ml-3"><b>Placa</b></div>
            <div class="col-md-4"><b>Marca</b></div>
            <div class="col-md-4"><b>Modelo</b></div>
            <div class="col-md-1"><b>Ano</b></div>
            </div>
            <div class="row">
            <div class="col-md-2 ml-3"><input type="text" class="form-control" name="board" id="board" style="text-transform: uppercase;" <?php if(!empty($row->board)){ echo "value='".$row->board."'"; } ?> ></div>
            <div class="col-md-4"><input type="text" class="form-control" name="model" id="model" readonly <?php if(!empty($row->model)){ echo "value='".$row->model."'"; } ?> ></div>
            <div class="col-md-4"><input type="text" class="form-control" name="brand" id="brand" readonly <?php if(!empty($row->brand)){ echo "value='".$row->brand."'"; } ?> ></div>
            <div class="col-md-1"><input type="text" class="form-control" name="year" id="year"  readonly <?php if(!empty($row->year)){ echo "value='".$row->year."'"; } ?> ></div>
            </div>
            <div class="row">
            <div class="col-md-11 ml-3"><b>Proprietario</b></div>
            <div class="col-md-11 ml-3"><input type="text" class="form-control" name="name" id="name" readonly <?php if(!empty($row->name)){ echo "value='".$row->name."'"; } ?> ></div>
            </div>
            <div class="row">
            <div class="col-md-6 ml-3"><b>E-mail</b></div>
            <div class="col-md-5"><b>Telefone</b></div>
            </div> 
            <div class="row">
            <div class="col-md-6 ml-3"><input type="text" class="form-control" name="mail" id="mail" readonly <?php if(!empty($row->mail)){ echo "value='".$row->mail."'"; } ?> ></div>
            <div class="col-md-5"><input type="text" class="form-control" name="phone" id="phone" readonly <?php if(!empty($row->phone)){ echo "value='".$row->phone."'"; } ?> ></div>
            </div>
            <div class="row">
            <div class="col-md-12 p-3"><h4>Peças</h4><hr></div>
            </div>
            <div class="row p-4">
            <div class="col-md-12 text-right p-2"><a href="javascipt:void(0)" id="adicionar_peca" name="adicionar_peca" class="btn btn-info"><i class="fas fa-plus-circle"></i> adicionar peça</a> </div>
            <div class="col-md-3 p-2 border" style="background-color:#eee"><b>Nome</b></div>
            <div class="col-md-3 p-2 border" style="background-color:#eee"><b>Quantidade</b></div>
            <div class="col-md-3 p-2 border" style="background-color:#eee"><b>Valor Unitário</b></div>
            <div class="col-md-3 p-2 border" style="background-color:#eee"><b>Vlr. tot Peça</b></div>
            <div class="col-md-3 p-2 border"><input type="text" name="name_part[]" class="form-control"></div>
            <div class="col-md-3 p-2 border"><input type="text" name="qtd_part[]" class="form-control" ></div>
            <div class="col-md-3 p-2 border"><input type="text" name="value_unitary[]" id="money2" class="form-control"></div>
            <div class="col-md-3 p-2 border"><input type="text" name="value_tot_part[]" id="money2" class="form-control"></div>
            </div>
            <div class="col-md-12 p-3"><button type="submit" class="btn btn-lg btn-block btn-danger"><b><?php echo $button_action; ?></b></button></div>
            </form>
    </div>
  </div>
</div>
<?php include __DIR__."/../include/footer.php"; ?> 
<?php include __DIR__."/../include/interno-veiculo.php"; ?>
<?php include __DIR__."/../include/mask.php"; ?> 
<?php include __DIR__."/../include/message.php"; ?> 