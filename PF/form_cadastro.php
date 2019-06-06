<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
 require_once('ini.php');
// define variables and set to empty values
$nomeErr = $emailErr = $senhaErr = "";
$nome = $email = $senha = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nome"])) {
    $nomeErr = "Digite um nome";
  } else {
    $nome = test_input($_POST["nome"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nome)) {
      $nomeErr = "Digite apenas letras sem acento"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Digite um email";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Digite um email válido"; 
    }
  }
    
  if (empty($_POST["senha"])) {
    $senhaErr = "Digite uma senha";
  } else {
    $senha = $_POST["senha"];
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if(strlen($senha) < 6 OR strlen($senha) > 12 ) {
      $senhaErr = "Digite uma senha entre 6 e 12 caracteres"; 
    }
  }

  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Trainee 2019.1</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Nome: <input type="text" name="nome">
  <span class="error">* <?php echo $nomeErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" >
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Senha: <input type="password" name="senha">
  <span class="error">* <?php echo $senhaErr;?></span>
  <br><br>
  
  <input type="submit" name="submit" value="Submit">  
</form>

<?php

 if(empty($nomeErr) AND empty($emailErr) AND empty($senhaErr)){

 	

    $query = "INSERT INTO users( nome, email, senha) VALUES (:nome,:email,:senha)";

    $conex =  db_connect();

    $stmt = $conex->prepare($query);

    $stmt->bindValue(':nome',$nome);
    $stmt->bindValue(':email',$email);
    $stmt->bindValue(':senha',md5($senha));

    $stmt->execute();

 }

?>
  <a href="index.php">Fazer login</a>

</body>
</html>