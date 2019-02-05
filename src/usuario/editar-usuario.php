<?php

    $mysqli = new mysqli('localhost', 'root', '', 'blog') 
        or die(mysqli_error($mysqli));
    
    $id = 0;
    $update = false;
    $nome = '';
    $email = '';
    $celular = '';
    $senha = '';

    if(isset($_POST['salvar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $celular = $_POST['celular'];
        $senha = $_POST['senha'];

        $mysqli->query("INSERT INTO usuario (nome, email, celular, senha) VALUES ('$nome', '$email', '$celular', '$senha')") or die($mysqli->error);
    
        $_SESSION['message'] = "Salvo com sucesso!";
        $_SESSION['msg_type'] = "success";
    
        header("location: ./../../users.php");
    }

    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update = true;
        $result = $mysqli->query("SELECT * FROM usuario WHERE id=$id") or die($mysqli->error());
        if(count($result)==1){
            $row = $result->fetch_array();
            $nome = $row['nome'];
            $email = $row['email'];
            $celular = $row['celular'];
            $senha = $row['senha'];
        }

    }

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $celular = $_POST['celular'];
        $senha = $_POST['senha'];

        $mysqli->query("UPDATE usuario SET nome='$nome', email='$email', celular='$celular', senha='$senha' WHERE id=$id") or die($mysqli->error);
        
        $_SESSION['message'] = "Atualizado com sucesso!";
        $_SESSION['msg_type'] = "warning";
   
        header("location: ./../../users.php");
    }   
    session_destroy();
    ?>