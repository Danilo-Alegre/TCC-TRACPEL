 <?php

    require_once "conexao.php";
    $conexao = novaConexao();

    //consulta da tabela usuários
    $resultado = array();
    $sql = "SELECT * FROM tblProduto order by id_produto desc";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    //armazena o resultado da consulta no vetor resultado
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

    ?>



 <!DOCTYPE html>
 <html lang="pt-br">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="../css/teste.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
 </head>
 <header>
     <nav class="nav-pc">
         <div class="logo">
             <img src="../img/logoTracpel.png" alt="">

         </div>

         <div class="cont-search">
             <form role="search">
                 <button class="input-group-text"><i class="bi bi-search"></i></button>
                 <input class="form-control" type="search" placeholder="O que você procura?" aria-label="Search">
             </form>
         </div>

         <div class="icons display-6">
             <a href="pg/carrinho.php" class="nav-icons">
                 <i class="bi bi-cart2 text-black"></i>
             </a>
             <a href="pg/login.php" class="nav-icons">
                 <i class="bi bi-person text-black "></i>
             </a>

             <a href="#" onclick="abrirNav()" class="ham">
                 <i class="bi bi-list"></i>
             </a>
         </div>



     </nav>



     <div class="cont-op">

         <div class="op">


             <h5 class="color1">Todos os Departamentos</h5>
             <h5>Tratores</h5>
             <h5>Colheitadeiras</h5>
             <h5>Terraplenagem</h5>
             <h5 class="color2">Sobre nós</h5>

         </div>
     </div>






     <div class="nav-mobile">


         <div class="cont-bar-mobile">
             <form role="search">
                 <div class="cont-search-mobile">
                     <button class="input-group-text"><i class="bi bi-search"></i></button>
                     <input class="form-control" type="search" placeholder="O que você procura?" aria-label="Search">
                 </div>
             </form>

             <div class="icons-mobile display-6">

                 <a href="pg/carrinho.php" class="nav-icons-mobile">
                     <i class="bi bi-cart2 text-black"></i>
                 </a>
                 <a href="pg/login.php" class="nav-icons-mobile">
                     <i class="bi bi-person text-black"></i>
                 </a>

             </div>
         </div>



         <div class="cont-op">

             <div class="op-mobile">


                 <h5 class="color1">Todos os Departamentos</h5>
                 <h5>Tratores</h5>
                 <h5>Colheitadeiras</h5>
                 <h5>Terraplenagem</h5>
                 <h5 class="color2">Sobre nós</h5>

             </div>
         </div>


     </div>




 </header>

 <body>

     <div class="cont-title">
         <h2>LANÇAMENTOS</h2>
     </div>


     <div class="cont">

         <?php
            foreach ($resultado as $campo) { ?>
             <div class="mycard">
                 <div class="card-img">
                     <img src="../img/uploads/<?php echo $campo["pdt_foto"] ?>">
                 </div>
                 <div class="cont-text">
                     <h1><?php echo $campo["pdt_nome"] ?></h1>
                     <h3>R$<?php echo $campo["pdt_valor"] ?></h3>
                 </div>
                 <div class="cont-btn">
                     <a href="pgsingle.php?id=<?php echo $campo["id_produto"] ?>">
                         <button>Comprar</button>
                     </a>
                 </div>
             </div>
         <?php } ?>

     </div>



     <script src="../js/bootstrap.bundle.min.js"></script>

     <script>
         const nav = document.querySelector('.nav-mobile')
         const op = document.querySelector('.op-mobile')
         const search = document.querySelector('.cont-search-mobile')
         const icons = document.querySelector('.nav-icons-mobile')
         const ham = document.querySelector('.ham')


         function abrirNav() {
             nav.classList.add('ativa')
             op.classList.add('ativa')
             search.classList.add('ativa')
             icons.classList.add('ativa')
             ham.removeEventListener('click', abrirNav);
             ham.addEventListener('click', fecharNav);
         }

         function fecharNav() {
             nav.classList.remove('ativa')
             ham.removeEventListener('click', fecharNav);
             ham.addEventListener('click', abrirNav);
         }
     </script>

 </body>

 </html>