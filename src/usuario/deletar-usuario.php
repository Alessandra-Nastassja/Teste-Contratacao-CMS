<?php

session_start();
    $mysqli = new mysqli('localhost', 'root', '', 'blog') 
        or die(mysqli_error($mysqli));

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $mysqli->query("DELETE FROM usuario WHERE id=$id") or die($mysqli->error());
    
    $_SESSION['message'] = "Deletado com sucesso!";
    $_SESSION['msg_type'] = "danger";

    header("location: ./../../users.php");
}