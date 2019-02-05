<nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
          aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">AdminStrap</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php">Dashboard</a></li>
          <!-- <li><a href="pages.html">Pages</a></li> -->
          <li><a href="posts.php">Posts</a></li>
          <li><a href="users.php">Users</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <?php
          if(!empty($_SESSION['id'])){
              echo "<li><a href='#'>Olá, ".$_SESSION['nome']."</a></li>";
              echo "<li><a href='./src/login/sair.php'>Sair</a></li>";
          }
          else{
              $_SESSION['msg'] = "Área restrita";
              header("Location: login.php");
          }
          ?>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>