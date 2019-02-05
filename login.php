<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <?php include_once ("./include/head.php") ?>
</head>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">AdminStrap</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center"> Área restrita <small>Login</small></h1>
          </div>
        </div>
      </div>
    </header>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
          <?php
            if(isset($_SESSION['msg'])){
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
            }
          ?>
            <form id="login" action="./src/login/login-usuario.php" method="post" class="well">
                  <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" class="form-control" placeholder="Digite seu e-mail">
                  </div>
                  <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" class="form-control" placeholder="Digite sua senha">
                  </div>
                  <input type="submit" name="btnLogin" class="btn btn-default btn-block" value="Acessar">
              </form>
          </div>
        </div>
      </div>
    </section>

    <?php include_once ("./include/footer.php") ?>

  <script>
     CKEDITOR.replace( 'editor1' );
     CKEDITOR.replace( 'editor2' );
 </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
