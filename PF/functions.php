<?php
 
/**
 * Conecta com o MySQL usando PDO
 */
function db_connect()
{
    try{
      $PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

      return $PDO;

    }catch(PDOException $e){
    	echo 'ERRO:' . $e->getMessage() . ' Message:' ; $e->getCode();
    }
}    