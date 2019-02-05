<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?php include_once ("./include/head.php") ?>
</head>

<body>
  <?php include_once ("./include/nav.php") ?>

  <?php include_once ("./include/header.php") ?>

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li class="active">Dashboard</li>
      </ol>
    </div>
  </section>

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <?php include_once ("./include/column-lateral.php") ?>
        </div>
        <div class="col-md-9">
          <!-- Website Overview -->
          <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">Website Overview</h3>
            </div>
            <div class="panel-body">
              <h2>Seja bem-vindo!</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include_once ("./include/footer.php") ?>

  <!-- Modals -->
  <?php include_once ("./include/modal-add-users.php") ?>
  <?php include_once ("./include/modal-add-pages.php") ?>
  <?php include_once ("./include/modal-add-posts.php") ?>

  <script>
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2');
  </script>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/bootstrap.min.js"></script>
</body>

</html>