<?php 


  session_start();
  $_SESSION['auth'] = false;
  header('Location:fazer_login.php');