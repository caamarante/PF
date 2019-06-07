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
    
    <section id="login">
        <button id="botaoinicio" type="button" class="btn botao ml-4 mt-4">
            <a id="voltar" href="">Voltar ao Inicio</a>
        </button>
        <div id="formulario" class="container-fluid">
            <h1 id="letrafaca" class="pb-5">Faça Login</h1>
            <form action="login.php" method="POST">
                <input type="email" name="email" placeholder="Login" class="estetica-form mb-5"><br>
                <input type="password" name="senha" placeholder="Senha" class="estetica-form mb-5"><br>
                <input type="submit" class="btn botao" value="Entrar">
            </form>
        </div>
    </section>

    <footer class="footer" id="footer-login">
        <h5>Desenvolvido por <a href="">Praxis - Empresa jr.</a> | Todos os direitos reservados</h5>
    </footer>


    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>