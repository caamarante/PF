<?php 
   session_start();
   require_once('ini.php');
   $$_SESSION['auth'] = false;
   $query = "SELECT * FROM `users`
   WHERE email=:email AND senha=:senha";

    $conex =  db_connect();

    $stmt = $conex->prepare($query);
    
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt->bindValue(':email',$email);
    $stmt->bindValue(':senha',md5($senha));

    $stmt->execute();
   
    $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(count($usuario) <= 0){
      header('Location:index.php?auth=erro');
      $auth = false;
    }
     
       
    else{
       header('Location:painel.php');
       $_SESSION['auth'] = true;
    }