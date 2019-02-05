<?php

    $mysqli = new mysqli('localhost', 'root', '', 'blog') 
        or die(mysqli_error($mysqli));
    
    $id = 0;
    $update = false;
    $titulo = '';
    $texto = '';

    if(isset($_POST['salvar'])){
        $titulo = $_POST['titulo'];
        $texto = $_POST['texto'];


        $mysqli->query("INSERT INTO noticias (titulo, texto) VALUES ('$titulo', '$texto')") or die($mysqli->error);
    
        $_SESSION['message'] = "Salvo com sucesso!";
        $_SESSION['msg_type'] = "success";
    
        header("location: ./../../posts.php");
    }

    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update = true;
        $result = $mysqli->query("SELECT * FROM noticias WHERE id=$id") or die($mysqli->error());
        if(count($result)==1){
            $row = $result->fetch_array();
            $titulo = $row['titulo'];
            $texto = $row['texto'];
        }

    }

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $texto = $_POST['texto'];


        $mysqli->query("UPDATE noticias SET titulo='$titulo', texto='$texto' WHERE id=$id") or die($mysqli->error);
        
        $_SESSION['message'] = "Atualizado com sucesso!";
        $_SESSION['msg_type'] = "warning";
   
        header("location: ./../../posts.php");
    }   
    session_destroy();
    ?>