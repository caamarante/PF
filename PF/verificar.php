<?php 
   session_start();
   require_once('ini.php');

   $_SESSION['auth'] = false;
   $_SESSION['authdono'] = false;

    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];

    $query = "SELECT * FROM clientes
    WHERE email=:email AND senha=:senha";

    $conex =  db_connect();

    $stmt = $conex->prepare($query);
    
    

    $stmt->bindValue(':email',$email);
    $stmt->bindValue(':senha',md5($senha));

    $stmt->execute();
   
    $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);


    $name = $usuario[0]['nome'];

    if(count($usuario) != 0){
        $_SESSION['nomec'] = $name;
        $_SESSION['auth'] = true;
        header('Location:pagina-cliente.php');

    }
    
    
    else{
        header('Location:fazer_login.php?deuerrado');
        $auth = false;
    }