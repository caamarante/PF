<?php 
session_start(); 
    
if(!$_SESSION['auth']){
  header('Location:fazer_login.php?auth=facalogin');
}
$name = $_SESSION['nomec'];



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marés do Caribe</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body>
    <section id="pagina-cliente">
        <div class="container-fluid">
            <div class="fundo-branco">
                    <p class="saudacao">Bem-vindo, <?php echo $name?>!</p>
                    <div class="botao-sair">
                        <a href="logout.php" id="cor-laranja">
                            <img src="img/sair.png" class="imagem-sair">
                            <p class="nome-sair">Sair</p>
                        </a>
                    </div>
                    <div class="row colunas justify-content-center mb-3" id="colunas1">
                        <div class="col-10 col-md ml-3 pb-5 fundo-laranja" id="diminuir-padding">
                            <p class="letra-colunas mt-3">Seu consumo</p>
                            <p class="itens-coluna">Água: <span class="quantidades-itens">0</span></p>
                            <p class="itens-coluna">Cerveja: <span class="quantidades-itens">0</span></p>
                            <p class="itens-coluna">Refrigerante: <span class="quantidades-itens">0</span></p>
                            <p class="itens-coluna">Suco: <span class="quantidades-itens">0</span></p>
                        </div>
                        <div class="col-10 col-md fundo-laranja ml-5">
                            <p class="letra-colunas mt-3">Diária</p>
                            <p class="itens-coluna text-center">Você está hospedado há</p>
                            <p class="text-center mt-5" id="dias-hospedagem">2 dia(s)</p>
                        </div>
                        <div class="col-10 col-md fundo-laranja ml-5 mr-4">
                            <p class="letra-colunas mt-3">Total até agora</p>
                            <p class="text-center mt-5 pb-3" id="total-hospedagem">R$ 200,00</p>
                        </div>
                    </div>
                    <div class="text-center">
                        <p id="letra-link-comentario">Conte-nos sua experiência com nossa pousada</p>
                        <button id="botao-comentario"><a class="text-white text-decoration-none" href="">Clicando aqui</a> </button>
                    </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <p class="letra-footer">Desenvolvido por <a href="">Praxis - Empresa jr.</a> | Todos os direitos reservados</p class="letra-footer">
    </footer>


    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>