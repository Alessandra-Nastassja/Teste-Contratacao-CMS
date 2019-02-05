<?php
session_start();
include_once("../conexao.php");

$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);

if($btnLogin){
   $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
   $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

//    echo "$email - $senha";
    if((!empty($email)) AND (!empty($senha))){
        echo password_hash($senha, PASSWORD_DEFAULT);
        $result_usuario = "SELECT id, nome, email, celular, senha FROM usuario WHERE email='$email' LIMIT 1";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        if($resultado_usuario){
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			if(password_verify($senha, $row_usuario['senha'])){
				$_SESSION['id'] = $row_usuario['id'];
				$_SESSION['nome'] = $row_usuario['nome'];
				$_SESSION['email'] = $row_usuario['email'];
				$_SESSION['celular'] = $row_usuario['celular'];
				header("Location: ./../../index.php");
			}else{
				$_SESSION['msg'] = "Login e senha incorreto!";
				header("Location: ./../../login.php");
			}
		}
    }else{
        $_SESSION['msg'] = "Login e senha incorreto";
        header("location:  ./../../login.php");
    }
}else{
    $_SESSION['msg'] = "Página não encontrada";
    header("location:  ./../../login.php");
}