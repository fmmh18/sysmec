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
        <input type="hidden" name="id_vehicle" id="id_vehicle">
        <input type="hidden" name="id_user" id="id_user">
        
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
            <div class="row ml-2">
            <div class="col-md-11">
            <table class="table"> 
              <tbody>
                <tr>
                  <td class="border-0 w-50"><input type="text" id="name_part0" placeholder="nome" class="form-control"></td>
                  <td class="border-0"><input type="text" placeholder="quantidade" id="qtd_part0" class="form-control" ></td>
                  <td class="border-0"><input type="text" placeholder="vlr. unitário" id="value_unitary0" class="form-control money2"></td>
                  <td class="border-0"><input type="text" placeholder="vlr. total" readonly id="value_tot_part0" class="form-control money2"></td>
                  <td class="border-0"><a href="javascipt:void(0)" id="add_part" name="add_part" class="btn btn-info"><i class="fas fa-plus-circle"></i></a></td>
                </tr>
              </tbody>
            </table>
            </div>
            </div>
            <div class="row ml-3">
            <div class="col-md-11">
            <table class="table table-striped table-bordered" id="piece">
              <thead>
                <tr>
                  <th class="w-50"><b>Nome</b></th>
                  <th><b>Quantidade</b></th>
                  <th><b>Vlr. Unitário</b></th>
                  <th><b>Vlr. total</b></th>
                  <th><b>Excluir</b></th>
                </tr>
              </thead>
              <tbody>
             </tbody>
            </table>
            </div>
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
<?php include __DIR__."/../include/campos.php"; ?> 