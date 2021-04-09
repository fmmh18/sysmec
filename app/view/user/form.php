<?php include __DIR__."/../include/header.php"; ?>
<div class="d-flex" id="wrapper">
<?php include __DIR__."/../include/sidemenu.php"; ?>
  <div id="page-content-wrapper">
    <nav class="navbar navbar-light bg-light text-white text-center">
        <button class="btn btn-outline-secondary text-white" id="menu-toggle"> <span class="navbar-toggler-icon"></span></button>
        <div class="col-md-10 text-center"><img src="<?php echo getenv('APP_HOST'); ?>/assets/media/logo/sysmec-56.png" class="mx-auto img-fluid"></div>
    </nav> 
    <div class="col-md-12">
    <h2><i class="fas fa-users"></i> <?php echo $subtitle; ?> Usuário</h2>
        <hr>
        <form action="<?php echo getenv('APP_HOST').$hidden_action; ?>" method="post">
        <input type="hidden" name="hidden_action" value="<?php echo $hidden_action; ?>">
        <input type="hidden" name="id" value="<?php echo $row->id; ?>">
            <div class="col-md-12"><b>Nome</b></div>
            <div class="col-md-12 p-2"><input type="text" class="form-control" name="name" <?php if(!empty($row->name)){ echo "value='".$row->name."'"; } ?> ></div>
            <div class="col-md-12"><b>E-mail</b></div>
            <div class="col-md-12 p-2"><input type="mail" class="form-control" name="mail" <?php if(!empty($row->mail)){ echo "value='".$row->mail."'"; } ?>></div>
            <div class="col-md-12"><b>CPF ou CNPJ</b></div>
            <div class="col-md-12 p-2"><input type="text" class="form-control" id="cpfcnpj" name="cpfcnpj" <?php if(!empty($row->cpfcnpj)){ echo "value='".$row->cpfcnpj."'"; } ?>></div>
            <div class="col-md-12"><b>Telefone e/ou Celular</b></div>
            <div class="col-md-12 p-2"><input type="text" class="form-control" id="phone" name="phone" <?php if(!empty($row->phone)){ echo "value='".$row->phone."'"; } ?>></div>
            <div class="col-md-12"><b>Senha</b></div>
            <div class="col-md-12 p-2"><input type="password" class="form-control" name="password" <?php if(!empty($row->password)){ echo "value='".$row->password."'"; } ?>></div>
            <div class="col-md-12"><b>CEP</b></div>
            <div class="col-md-12 p-2"><input type="text" class="form-control" name="zipcode" id="zipcode" <?php if(!empty($row->zipcode)){ echo "value='".$row->zipcode."'"; } ?>></div>
            <div class="col-md-12"><b>Endereço</b></div>
            <div class="col-md-12 p-2"><input type="text" class="form-control" name="address" id="address" <?php if(!empty($row->address)){ echo "value='".$row->address."'"; } ?>></div>
            <div class="col-md-12"><b>Número</b></div>
            <div class="col-md-12 p-2"><input type="text" class="form-control" name="number" id="number" <?php if(!empty($row->number)){ echo "value='".$row->number."'"; } ?>></div>
            <div class="col-md-12"><b>Bairro</b></div>
            <div class="col-md-12 p-2"><input type="text" class="form-control" name="neighborhood" id="neighborhood" <?php if(!empty($row->neighborhood)){ echo "value='".$row->neighborhood."'"; } ?>></div>
            <div class="col-md-12"><b>Complemento</b></div>
            <div class="col-md-12 p-2"><input type="text" class="form-control" name="complement" id="complement" <?php if(!empty($row->complement)){ echo "value='".$row->complement."'"; } ?>></div>
            <div class="col-md-12"><b>Cidade</b></div>
            <div class="col-md-12 p-2"><input type="text" class="form-control" name="city" id="city" readonly <?php if(!empty($row->city)){ echo "value='".$row->city."'"; } ?>></div>
            <div class="col-md-12"><b>Estado</b></div>
            <div class="col-md-12 p-2"><input type="text" class="form-control" name="state" id="state" readonly <?php if(!empty($row->state)){ echo "value='".$row->state."'"; } ?>></div>
            <div class="col-md-12"><b>Perfil</b></div>
            <div class="col-md-12 p-2">
            <select name="level" id="perfil" class="form-control">
            <?php
            $i = 0;
            foreach($levels as $level): ?>
                <?php if($row->level == $i): ?>
                <option selected value="<?php echo $i; ?>"><?php echo $level; ?></option>
                <?php else: ?>
                <option value="<?php echo $i; ?>"><?php echo $level; ?></option>
                <?php endif; ?>
            <?php 
            $i++;
            endforeach; ?>
            </select>
            </div>
            <div class="col-md-12 p-3"><button type="submit" class="btn btn-lg btn-block btn-danger"><b><?php echo $button_action; ?></b></button></div>
            </form>
    </div>
  </div>
</div>
<?php include __DIR__."/../include/footer.php"; ?> 
<?php include __DIR__."/../include/cep.php"; ?>
<?php include __DIR__."/../include/mask.php"; ?> 
<?php include __DIR__."/../include/message.php"; ?> 