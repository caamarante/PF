<?php 
    session_start();
    include('ini.php');

    $consulta = "SELECT * FROM clientes";
    $conex =  db_connect();
    $stmt = $conex->query($consulta);
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marés do caribe</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body>
    


    <section id="pagina-dono">
        <div class="container-fluid">
            <div class="fundo-branco" id="fundo-branco-dono">
                <p class="saudacao" id="saudacao-dono">Bem-vindo, Matheus!</p>
                    <div class="botao-sair">
                        <a href="" id="cor-verde">
                            <img src="img/sair-verde.png" class="imagem-sair">
                            <p class="nome-sair">Sair</p>
                        </a>
                    </div>
                <div class="row colunas justify-content-center mb-3">
                    <div class="col-10 col-sm-6">
                        <p id="letra-pesquisa">Pesquise o nome do cliente:</p>
                    </div>
                    <div class="col-10 col-sm-6 justify-content-center" id="lugar-da-pesquisa">
                        <input type="text" id="input-pesquisar">
                    </div>
                </div>
                <table class="table scroll-tabela" id="tabela">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Quarto</th>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Consumo</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($usuario = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
                        <tr class="text-center">
                            <th scope="row"><?php echo $usuario["quarto"];?></th>
                            <td><?php echo $usuario["nome"];?></td>
                            <td><?php echo $usuario["email"];?></td>
                            <td>4 itens</td>
                            <td>R$200,00</td>
                            <td><img src="img/lixo.png" id="imagem-lixo" alt=""></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <?php
 require_once('ini.php');
// define variables and set to empty values
$quartoErr = $nomeErr = $emailErr = $senhaErr = "";
$quarto = $nome = $email = $senha = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["quarto"])) {
        $quartoErr = "Digite o quarto";
      } else {
        $quarto = test_input($_POST["quarto"]);
      }


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


                <div id="cadastrar-cliente">
                    <p id="letra-cadastrar">Cadastrar Cliente:</p>
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="row justify-content-center" id="row-cadastrar">
                            <div class="col-10 col-sm-6 col-md-2">
                                <input type="text" class="input-cadastrar" name="quarto" placeholder="Quarto">
                                <span class="error">*<?php echo $quartoErr;?></span>
                            </div>
                            <div class="col-10 col-sm-6 col-md-4 mt-2 mt-sm-0">
                                <input type="text" class="input-cadastrar ml-2" name="nome" placeholder="Nome">
                                <span class="error">*<?php echo $nomeErr;?></span>
                            </div>
                            <div class="col-10 col-sm-6  mt-2 mt-md-0">
                                <input type="text" class="input-cadastrar ml-2" name="email" id="input-email" placeholder="E-mail">
                                <span class="error">*<?php echo $emailErr;?></span>
                            </div>
                            <div class="col-10 col-sm-6 col-md-4 mt-2 mt-md-4">
                                <input type="password" class="input-cadastrar" name="senha" placeholder="Senha">
                                <span class="error">*<?php echo $senhaErr;?></span>
                            </div>
                            <div class="col-10 col-sm-4 col-md-8 mt-4" id="tirar-padding-botao">
                                <button type="submit" class="ml-md-5" id="botao-cadastrar">Cadastrar</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <p class="letra-footer">Desenvolvido por <a href="">Praxis - Empresa jr.</a> | Todos os direitos reservados</p class="letra-footer">
    </footer>

    <?php

 if(empty($quartoErr) AND empty($nomeErr) AND empty($emailErr) AND empty($senhaErr)){

 	

    $query = "INSERT INTO clientes(quarto, nome, email, senha) VALUES (:quarto, :nome,:email,:senha)";

    $conex =  db_connect();

    $stmt = $conex->prepare($query);

    $stmt->bindValue(':quarto',$quarto);
    $stmt->bindValue(':nome',$nome);
    $stmt->bindValue(':email',$email);
    $stmt->bindValue(':senha',md5($senha));

    $stmt->execute();

 }

?>

    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>