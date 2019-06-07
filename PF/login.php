<?php 
   session_start();
   $emaildono = 'Maresdocaribe@outlook.com';
   $senhadono = '123456';

   $email = $_POST['email'];
   $senha = $_POST['senha'];
   $_SESSION['authdono'] = false;
   if($email == $emaildono && $senha == $senhadono){
      $_SESSION['authdono'] = true;
      header ('Location: pagina-dono.php');
   }else{
      header ('Location: verificar.php');
      $_SESSION['email']=$email;
      $_SESSION['senha']=$senha;
   }