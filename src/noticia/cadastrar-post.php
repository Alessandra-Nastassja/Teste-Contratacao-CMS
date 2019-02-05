<?php
   
  include_once ("conexao.php")

  $conn = new mysqli($host, $username, $password, $dbname);

   if ($conn->connect_error) {
        die("Connection to database failed: " . $conn->connect_error);
   }
   
   $nome  = $_POST['titulo'];
   $email  = $_POST['texto'];

   if(!$nome || !$email || !$celular || $senha){
     $result = 2;
   }else {
      $sql    = "insert into noticias (titulo, texto) values (?, ?)  ";
      $stmt   = $conn->prepare($sql);
      $stmt->bind_param('sss', $titulo, $texto);
      if($stmt->execute()){
        $result = 1;
      }
   }
   echo $result;
   $conn->close();
   
   ?>