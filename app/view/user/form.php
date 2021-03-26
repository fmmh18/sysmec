<?php include __DIR__."/../include/header.php"; ?>
<div class="d-flex" id="wrapper">
<?php include __DIR__."/../include/sidemenu.php"; ?>
  <div id="page-content-wrapper">
    <nav class="navbar navbar-light bg-light text-white text-center">
        <button class="btn btn-outline-secondary text-white" id="menu-toggle"> <span class="navbar-toggler-icon"></span></button>
        <div class="col-md-10 text-center"><img src="<?php echo getenv('APP_HOST'); ?>/assets/media/logo/sysmec-56.png" class="mx-auto img-fluid"></div>
    </nav> 
    <div class="col-md-12">
    <h2><?php echo $subtitle; ?> Usuário</h2>
        <hr>
            <div class="col-md-12"><b>Nome</b></div>
            <div class="col-md-12 p-2"><input type="text" class="form-control" name="name" <?php if(!empty($data->name)){ echo "value='".$data->name."'"; } ?> ></div>
            <div class="col-md-12"><b>E-mail</b></div>
            <div class="col-md-12 p-2"><input type="mail" class="form-control" name="mail" <?php if(!empty($data->mail)){ echo "value='".$data->mail."'"; } ?>></div>
            <div class="col-md-12"><b>CPF ou CNPJ</b></div>
            <div class="col-md-12 p-2"><input type="text" class="form-control" id="cpfcnpj" name="cpfcnpj" <?php if(!empty($data->cpfcnpj)){ echo "value='".$data->cpfcnpj."'"; } ?>></div>
            <div class="col-md-12"><b>Telefone e/ou Celular</b></div>
            <div class="col-md-12 p-2"><input type="text" class="form-control" id="phone" name="phone" <?php if(!empty($data->phone)){ echo "value='".$data->phone."'"; } ?>></div>
            <div class="col-md-12"><b>Senha</b></div>
            <div class="col-md-12 p-2"><input type="password" class="form-control" name="password" <?php if(!empty($data->password)){ echo "value='".$data->password."'"; } ?>></div>
            <div class="col-md-12"><b>CEP</b></div>
            <div class="col-md-12 p-2"><input type="text" class="form-control" name="zipcode" id="zipcode" <?php if(!empty($data->zipcode)){ echo "value='".$data->zipcode."'"; } ?>></div>
            <div class="col-md-12"><b>Endereço</b></div>
            <div class="col-md-12 p-2"><input type="text" class="form-control" name="address" id="address" <?php if(!empty($data->address)){ echo "value='".$data->address."'"; } ?>></div>
            <div class="col-md-12"><b>Número</b></div>
            <div class="col-md-12 p-2"><input type="text" class="form-control" name="number" id="number" <?php if(!empty($data->number)){ echo "value='".$data->number."'"; } ?>></div>
            <div class="col-md-12"><b>Bairro</b></div>
            <div class="col-md-12 p-2"><input type="text" class="form-control" name="neighborhood" id="neighborhood" <?php if(!empty($data->neighborhood)){ echo "value='".$data->neighborhood."'"; } ?>></div>
            <div class="col-md-12"><b>Complemento</b></div>
            <div class="col-md-12 p-2"><input type="text" class="form-control" name="complement" id="complement" <?php if(!empty($data->complement)){ echo "value='".$data->complement."'"; } ?>></div>
            <div class="col-md-12"><b>Cidade</b></div>
            <div class="col-md-12 p-2"><input type="text" class="form-control" name="city" id="city" readonly <?php if(!empty($data->city)){ echo "value='".$data->city."'"; } ?>></div>
            <div class="col-md-12"><b>Estado</b></div>
            <div class="col-md-12 p-2"><input type="text" class="form-control" name="state" id="state" readonly <?php if(!empty($data->state)){ echo "value='".$data->state."'"; } ?>></div>
            <div class="col-md-12"><b>Perfil</b></div>
            <div class="col-md-12 p-2">
            <select name="perfil" id="perfil" class="form-control">
            <?php
            $i = 0;
            foreach($levels as $level): ?>
                <?php if($data->level == $i): ?>
                <option selected value="<?php echo $i; ?>"><?php echo $level; ?></option>
                <?php else: ?>
                <option value="<?php echo $i; ?>"><?php echo $level; ?></option>
                <?php endif; ?>
            <?php 
            $i++;
            endforeach; ?>
            </select>
            </div>
            <div class="col-md-12 p-3"><button type="submit" class="btn btn-lg btn-block btn-danger"><b>adicionar</b></button></div>
          
    </div>
  </div>
</div>
<?php include __DIR__."/../include/footer.php"; ?> 
<?php include __DIR__."/../include/cep.php"; ?>
<?php include __DIR__."/../include/mask.php"; ?> 
<?php include __DIR__."/../include/message.php"; ?> 