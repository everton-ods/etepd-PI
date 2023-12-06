<?php
session_start();
include('verifica_login.php');
include("conexao.php");

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}


$user_id = $_SESSION['id'];

$query = "SELECT * FROM usuario WHERE id = $user_id";
$result = mysqli_query($conexao, $query);
$user = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>perfil</title>
    <link rel="stylesheet" href="../css/perfil.css" />
  </head>

  <body>
  <header>
        <nav>
            <img class="logo-header" src="../img/logo.png" alt="logo-etepd">
            <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <ul class="nav-list">
            <li><a href="../index.html">LOGIN</a></li>
            <li><a href="fag.html">SOBRE-NÓS</a></li>
            </ul>
        </nav>
</header>

<div class="line-header"></div>
<main>
    <div class="container">
        <div class="card">

            <img  src="../php/<?php echo $user['arquivos'] ?>" alt="perfil" class="profile-img">
            
            <div class="container-text">
                <h1 class="name">
                    <?php echo $user['nome'];?>
                </h1>

                <h3 class="desc">
                    <ul>
                       <li class="descre">
                           <p>E-mail: <?php echo $user['email'];?></p>
                        </li> 
                        <li class="descre">
                           <p> CPF: <?php echo $user['cpf'];?></p>
                        </li>
                        <li class="descre">
                           <p>Turma: <?php echo $user['turma'];?></p>
                        </li>
                        
                        <a class="sair" href="sair.php">Sair</a>
                        
                    </ul>
                    
                </h3>
            </div>
            <img class="correct" src="../img/correct.png" alt="">

            
    </div>
    </main>
    <footer class="footer">
      <div class="social">
        <p class="logoT"> ETE - PORTO DIGITAL</p>
      </div>
  </footer>

    
    
    <script src="../js/mobile-navbar.js"></script>
  </body>
</html>