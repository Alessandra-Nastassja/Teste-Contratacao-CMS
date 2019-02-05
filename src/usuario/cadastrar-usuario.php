<?php
   
  include_once ("conexao.php")

  $conn = new mysqli($host, $username, $password, $dbname);

   if ($conn->connect_error) {
        die("Connection to database failed: " . $conn->connect_error);
   }
   
   $nome  = $_POST['nome'];
   $email  = $_POST['email'];
   $celular  = $_POST['celular'];
   $senha  = $_POST['senha'];

   if(!$nome || !$email || !$celular || $senha){
     $result = 2;
   }elseif (!strpos($email, "@") || !strpos($email, ".")) {
     $result = 3;
   }
   else {
      $sql    = "insert into usuario (nome, email, celular, senha) values (?, ?, ?, ?)  ";
      $stmt   = $conn->prepare($sql);
      $stmt->bind_param('sss', $nome, $email, $celular, $senha);
      if($stmt->execute()){
        $result = 1;
      }
   }
   echo $result;
   $conn->close();
   
   ?>