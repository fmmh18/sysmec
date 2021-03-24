<div class="bg-dark text-white" id="sidebar-wrapper">
      <div class="list-group list-group-flush">
          <?php if(!empty($_SESSION['uID'])): ?>
          <div>
          <?php if($_SESSION['uLevel'] != 2): ?>
          <div class="row mb-2">
             <div class="col-md-8"><div class="mt-1"><?php echo $_SESSION['uName']; ?></div></div>
            <div class="col-md-1" style="margin-left:-8px;margin-top:10px"><a href="usuario/editar/<?php echo $_SESSION['uID']; ?>" class="badge badge-info"><i class="fas fa-user-edit"></i> Editar</a></div>
          </div>
          <?php else: ?>
            <div class="row mb-2">
            <div class="col-md-4"><img src="/<?php echo getenv('APP_UPLOADLOGO').$_SESSION['uFoto'];?>" class="img-fluid rounded-circle p-2"></div>
            <div class="col-md-7"><div class="mt-1"><?php echo $_SESSION['uName']; ?><a href="usuario/editar/<?php echo $_SESSION['uID']; ?>" class="badge badge-info"><i class="fas fa-user-edit"></i> Editar</a></div></div>
          </div>
          <?php endif; ?>
          </div>
          <?php endif; ?>
          <a href="<?php echo getenv('APP_HOST'); ?>/"  class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-home"></i> Início</a>
          <?php if(empty($_SESSION['uID'])): ?>
            <a href="<?php echo getenv('APP_HOST'); ?>/login" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-sign-in-alt"></i> Login</a>
          <?php else: ?>
          <?php if($_SESSION['uLevel'] == 1): ?>
              <a href="<?php echo getenv('APP_HOST'); ?>/usuario" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-user"></i> Usuários</a>
              <a href="<?php echo getenv('APP_HOST'); ?>/orcamento" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-book"></i> Orçamentos</a>   
              <a href="<?php echo getenv('APP_HOST'); ?>/veiculo" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-list"></i> Veículos</a>  
          <?php elseif($_SESSION['uLevel'] == 2): ?> 
              <a href="<?php echo getenv('APP_HOST'); ?>/orcamento" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-book"></i> Orçamentos</a>   
              <a href="<?php echo getenv('APP_HOST'); ?>/veiculo" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-list"></i> Veículos</a>  
          <?php elseif($_SESSION['uLevel'] == 3): ?>     
            <a href="<?php echo getenv('APP_HOST'); ?>/orcamento" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-book"></i> Orçamentos</a>   
          <?php endif; ?> 
          <?php endif; ?>
            <a href="<?php echo getenv('APP_HOST'); ?>/sair" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-sign-out-alt"></i> Sair</a>
      </div>
</div>