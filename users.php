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
                <li><a href="index.html">Dashboard</a></li>
                <li class="active">Usuários</li>
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

                    <div class="panel panel-default" id="form-editar">
                        <div class="panel-heading main-color-bg">
                            <h3 class="panel-title">Alterar usuário</h3>
                        </div>

                        <?php require_once './src/usuario/editar-usuario.php'; ?> 

                        <?php
                          if(isset($_SESSION['message'])): 
                        ?>
                        <div class="alert alert-<?=$_SESSION['msg_type']?> alert-dismissible fade show" role="alert">
                          <?php 
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                          ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <?php endif ?>

                        <div class="panel-body">
                            <div class="row">
                                <form action="./src/usuario/editar-usuario.php" method="post">
                                    <div class="modal-body">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <div class="form-group">
                                            <label for="nome">Nome completo: *</label>
                                            <input type="text" class="form-control" name="nome" value="<?php echo $nome; ?>" placeholder="Digite seu nome completo">
                                            <span class="invalid-feedback invalid-feedback-nome">
                                              Exemplo: Ana Maria de Oliveirs
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">E-mail: *</label>
                                            <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="Digite seu e-mail">
                                            <span class="invalid-feedback invalid-feedback-email">
                                              Exemplo: ana.maria@dominio.com.br
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="celular">Celular: *</label>
                                            <input type="text" class="form-control phone_with_ddd" name="celular" value="<?php echo $celular; ?>" placeholder="Digite seu número de celular">
                                            <span class="invalid-feedback invalid-feedback-celular">
                                              Exemplo: (11) 00000-0000
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="senha">Senha: *</label>
                                            <input type="password" class="form-control" name="senha" value="<?php echo $senha; ?>" placeholder="Digite sua senha">
                                            <span class="invalid-feedback invalid-feedback-senha">
                                            Exemplo: Letras maiúsculas e minúsculas, números e caracteres.
                                            </span>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <?php 
                                      if($update == true):
                                    ?>
                                      <button type="submit" class="btn btn-info" name="update">Alterar</button>
                                    <?php else: ?>
                                      <button type="submit" class="btn btn-success" name="salvar">Cadastrar</button>
                                    <?php endif; ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading main-color-bg">
                            <h3 class="panel-title">Users</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-control" type="text" placeholder="Filter Users...">
                                </div>
                            </div>
                            <br>
                            <?php
                              $conexao = mysqli_connect('localhost', 'root', '', 'blog') or die(mysqli_error($mysqli));    
                              $resultados = $conexao->query("SELECT * FROM usuario");
                              // pre_r($result);
                            ?>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Celular</th>
                                    <th colspan="2">Ações</th>
                                    </tr>
                                </thead>
                                <?php
                                  while($row = $resultados->fetch_assoc()): 
                                ?>
                                <tbody>
                                <tr>
                                  <td><?php echo $row['nome']?></td>
                                  <td><?php echo $row['email']?></td>
                                  <td><?php echo $row['celular']?></td>
                                  <td>
                                    <a href="users.php?edit=<?php echo $row['id']; ?>"
                                      class="btn btn-primary">Editar</a>
                                    <a href="./src/usuario/deletar-usuario.php?delete=<?php echo $row['id']; ?>"
                                      class="btn btn-danger">Deletar</a>
                                  </td>
                                </tr>
                                </tbody>
                                <?php endwhile;?>
                            </table>
                            <?php
                              function pre_r($array){
                                echo '<pre>';
                                print_r($array);
                                echo '</pre>';
                              }

                            ?>
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