<?php
  session_start(); 
  
  if(!$_SESSION['auth']){
    header('Location:index.php?auth=facalogin');
  }
    echo "Painel do usuario";
?>

<a href="logout.php">SAIR<a>

