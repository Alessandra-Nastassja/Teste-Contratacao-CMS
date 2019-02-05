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
                <li class="active">Posts</li>
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
                            <h3 class="panel-title">Alterar notícia</h3>
                        </div>

                        <?php require_once './src/noticia/editar-noticia.php'; ?>

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
                                <form action="./src/noticia/editar-noticia.php" method="post">
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <div class="form-group">
                                            <label for="titulo">Título: *</label>
                                            <input type="text" class="form-control" name="titulo" value="<?php echo $titulo; ?>"
                                                placeholder="Digite o título da notícia">
                                            <span class="invalid-feedback invalid-feedback-titulo">
                                                Exemplo: Filme de Super Mario Bros.
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="texto">Texto: *</label>
                                            <input type="text" class="form-control" name="texto" value="<?php echo $texto; ?>"
                                                placeholder="Digite seu e-mail">
                                            <span class="invalid-feedback invalid-feedback-texto">
                                                Exemplo: O nosso encanador mais querido do universo dos games estreará em seu próprio filme...
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
                            <h3 class="panel-title">Posts</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-control" type="text" placeholder="Filter Posts...">
                                </div>
                            </div>
                            <br>

                            <?php
                              $conexao = mysqli_connect('localhost', 'root', '', 'blog') or die(mysqli_error($mysqli));    
                              $resultados = $conexao->query("SELECT * FROM noticias");
                              // pre_r($result);
                            ?>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Texto</th>
                                    <th colspan="2">Ações</th>
                                    </tr>
                                </thead>
                                <?php
                                  while($row = $resultados->fetch_assoc()): 
                                ?>
                                <tbody>
                                <tr>
                                  <td><?php echo $row['titulo']?></td>
                                  <td><?php echo $row['texto']?></td>
                                  <td>
                                    <a href="posts.php?edit=<?php echo $row['id']; ?>"
                                      class="btn btn-primary">Editar</a>
                                    <a href="./src/noticia/deletar-posts.php?delete=<?php echo $row['id']; ?>"
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

    <!-- Modals -->

    <!-- Add Page -->
    <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Page</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Page Title</label>
                            <input type="text" class="form-control" placeholder="Page Title">
                        </div>
                        <div class="form-group">
                            <label>Page Body</label>
                            <textarea name="editor1" class="form-control" placeholder="Page Body"></textarea>
                        </div>
                        <!-- <div class="checkbox">
          <label>
            <input type="checkbox"> Published
          </label>
        </div> -->
                        <div class="form-group">
                            <label>Meta Tags</label>
                            <input type="text" class="form-control" placeholder="Add Some Tags...">
                        </div>
                        <div class="form-group">
                            <label>Meta Description</label>
                            <input type="text" class="form-control" placeholder="Add Meta Description...">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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