<?php include __DIR__."/include/header.php"; ?> 
<div class="container mt-5">
    <div class="row mt-5" id="login">
        <form action="<?php echo getenv('APP_HOST'); ?>/login" method="post">
        <div class="col-md-4 mt-5 offset-md-5 bg-white">
            <div class="row">
                <div class="col-md-12 text-center"><img src="<?php echo getenv('APP_HOST'); ?>/assets/media/logo/sysmec-128.png" alt=""></div>
                <div class="col-md-12 text-center"><b>E-mail</b></div>
                <div class="col-md-12 p-2"><input type="mail" class="form-control" name="mail"></div>
                <div class="col-md-12 text-center"><b>Senha</b></div>
                <div class="col-md-12 p-2"><input type="password" class="form-control" name="password"></div>
                <div class="col-md-12 p-3"><button type="submit" class="btn btn-lg btn-block btn-danger"><i class="fa fa-sign-in-alt"></i> <b>Acessar</b></button></div>
            </div>
        </div>
        <div class="col-md-4 offset-md-5 p-4 text-center bg-white"><a href="javascript:void(0);" id="btn-register"><i class="fa fa-plus-circle"></i> Criar uma nova conta</a></div>
        </form>
    </div>
    <div class="row mt-5" id="register" class="sr-only" style="display:none">
        <form action="<?php echo getenv('APP_HOST'); ?>/registrar" method="post" id="register-client">
        <input type="hidden" name="level" value="2">
        <div class="col-md-6 mt-5 offset-md-3 bg-white">
            <div class="row">
                <div class="col-md-12 text-center"><img src="<?php echo getenv('APP_HOST'); ?>/assets/media/logo/sysmec-128.png" alt=""></div>
                <div class="col-md-12"><b>Nome</b></div>
                <div class="col-md-12 p-2"><input type="text" class="form-control" name="name"></div>
                <div class="col-md-12"><b>E-mail</b></div>
                <div class="col-md-12 p-2"><input type="mail" class="form-control" name="mail"></div>
                <div class="col-md-12"><b>CPF ou CNPJ</b></div>
                <div class="col-md-12 p-2"><input type="text" class="form-control" id="cpfcnpj" name="cpfcnpj"></div>
                <div class="col-md-12"><b>Telefone e/ou Celular</b></div>
                <div class="col-md-12 p-2"><input type="text" class="form-control" id="phone" name="phone"></div>
                <div class="col-md-12"><b>Senha</b></div>
                <div class="col-md-12 p-2"><input type="password" class="form-control" name="password"></div>
                <div class="col-md-12"><b>CEP</b></div>
                <div class="col-md-12 p-2"><input type="text" class="form-control" name="zipcode" id="zipcode"></div>
                <div class="col-md-12"><b>Endereço</b></div>
                <div class="col-md-12 p-2"><input type="text" class="form-control" name="address" id="address"></div>
                <div class="col-md-12"><b>Número</b></div>
                <div class="col-md-12 p-2"><input type="text" class="form-control" name="number" id="number"></div>
                <div class="col-md-12"><b>Bairro</b></div>
                <div class="col-md-12 p-2"><input type="text" class="form-control" name="neighborhood" id="neighborhood"></div>
                <div class="col-md-12"><b>Complemento</b></div>
                <div class="col-md-12 p-2"><input type="text" class="form-control" name="complement" id="complement"></div>
                <div class="col-md-12"><b>Cidade</b></div>
                <div class="col-md-12 p-2"><input type="text" class="form-control" name="city" id="city" readonly></div>
                <div class="col-md-12"><b>Estado</b></div>
                <div class="col-md-12 p-2"><input type="text" class="form-control" name="state" id="state" readonly></div>
                <div class="col-md-12 p-3"><button type="submit" class="btn btn-lg btn-block btn-danger"><b>Criar a conta</b></button></div>
            </div>
        </div>
        <div class="col-md-6 offset-md-3 p-4 text-center bg-white"><a href="javascript:void(0);" id="btn-login"><i class="fa fa-sign-in-alt"></i> Acessar sua conta</a></div>
        </form>
    </div>
</div>
<?php include __DIR__."/include/footer.php"; ?>
<?php include __DIR__."/include/cep.php"; ?>
<?php include __DIR__."/include/mask.php"; ?> 
<?php include __DIR__."/include/message.php"; ?> 
<script>
$(document).ready(function(){
    $("#btn-register").click(function(event){
        $("#login").fadeOut(1500);
        $("#register").fadeIn(1500);
        $("#login").addClass("sr-only");
        $("#register").removeClass("sr-only");
   });
   $("#btn-login").click(function(event){
        $("#register").fadeOut(1500);
        $("#login").fadeIn(1500);
        $("#login").removeClass("sr-only"); 
        $("#register").addClass("sr-only");
   });
});
</script>