<?php
      session_start();
      if (!empty($_SESSION['id'])) {
         if ($_SESSION['categoria'] == 1) {
            header('Location: pg/gerente.php');
         } else {
            header('Location: pg/home.php');
         }
      }
      ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tracpel</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="stylesheet" href="./css/style.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Shrikhand&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Reddit+Sans:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
   <link rel="shortcut icon" href="./img/logoTracpel.png">
</head>

<?php require_once './utils/menu.php'; ?>

<body>

      <!--Banner-->
      <div class="banner mt-4">
         <h3 class="text-white text-center banner-text">TRACPEL - CONFIANÇA EM </h3>
         <div class="text-anima">
            <h3 class="text-white  text-center  banner-text">
               CADA PARAFUSO
            </h3>
            <div class="anima mx-3">
               <i class="bi bi-nut text-white banner-text  text-center "></i>
            </div>
         </div>
      </div>
      <!--Banner-->




      <!--Marcas-->
      <div id="carouselExampleSlidesOnly" class="carousel center-car mt-5 mb-5 slide" data-bs-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="center-car2">
                  <div class="center-car3">
                     <figure>
                        <img src="./img/patro1.png " alt="">
                     </figure>
                  </div>
                  <div class="center-car3">
                     <figure>
                        <img src="./img/patro2.png" alt="">
                     </figure>
                  </div>
                  <div class="center-car3">
                     <figure>
                        <img src="./img/patro3.png" alt="">
                     </figure>
                  </div>
                  <div class="center-car3">
                     <figure>
                        <img src="./img/patro4.png" alt="">
                     </figure>
                  </div>
                  <div class="center-car3">
                     <figure>
                        <img src="./img/patro5.jpg" alt="">
                     </figure>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="center-car2">
                  <div class="center-car3">
                     <figure>
                        <img src="./img/patro6.png" alt="">
                     </figure>
                  </div>
                  <div class="center-car3">
                     <figure>
                        <img src="./img/patro7.jpg" alt="">
                     </figure>
                  </div>
                  <div class="center-car3">
                     <figure>
                        <img src="./img/patro8.jpg" alt="">
                     </figure>
                  </div>
                  <div class="center-car3">
                     <figure>
                        <img src="./img/patro9.jpg" alt="">
                     </figure>
                  </div>
                  <div class="center-car3">
                     <figure>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/ce/Caterpillar-shortened.svg/1024px-Caterpillar-shortened.svg.png" alt="">
                     </figure>
                  </div>
               </div>
            </div>
         </div>
         <button class="carousel-control-prev bg-secondary btn-car" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden text-black">Previous</span>
         </button>
         <button class="carousel-control-next bg-secondary btn-car" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
         </button>
      </div>
      <!--Marcas-->




      <div class="text-center mt-5">
         <h1>DESTAQUES</h1>
      </div>

      <!--Cards-->

      <?php
      require_once "config/conexao.php";
      $conexao = novaConexao();

      // Consulta da tabela produtos
      $resultado = array();
      $sql = "SELECT * FROM tblProduto WHERE pdt_dest = 1 ORDER BY id_produto DESC";
      $stmt = $conexao->prepare($sql);
      $stmt->execute();
      // Armazena o resultado da consulta no vetor resultado
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
      ?>


      <div class="cont">
         <?php
         foreach ($resultado as $campo) { ?>
            <div class="mycard">
               <div class="card-img">
                  <img src="img/uploads/<?php echo $campo["pdt_foto"] ?>">
               </div>
               <div class="cont-text">
                  <h1><?php echo $campo["pdt_nome"] ?></h1>
                  <h3>R$<?php echo $campo["pdt_valor"] ?></h3>
               </div>
               <div class="cont-btn">
                    <a href="pg/pgsingle.php?id=<?php echo $campo["id_produto"] ?>">
                     <button>Comprar</button>
                  </a>
               </div>
            </div>
         <?php } ?>
      </div>
<!-- 
      <div class="ex">
         <div class="div1">
            <h4>MANGUEIRAS</h4>
         </div>
         <div class="div2">
            <h4>ROLAMENTOS</h4>
         </div>
         <div class="div3">
            <h4>CORRENTES</h4>
         </div>
         <div class="div4">
            <h4>RETENTORES</h4>
         </div>
         <div class="div5">
            <h4>PORCAS</h4>
         </div>
      </div> -->

      <div class="cont-title">
         <h2>LANÇAMENTOS</h2>
      </div>

     <?php

      require_once "config/conexao.php";
      $conexao = novaConexao();

      //consulta da tabela produtos
      $resultado2 = array();
      $sql = "SELECT * FROM tblProduto  WHERE pdt_lanc = 1 order by id_produto desc";
      $stmt = $conexao->prepare($sql);
      $stmt->execute();
      //armazena o resultado da consulta no vetor resultado
      $resultado2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

      ?>

      <div class="cont">

         <?php
         foreach ($resultado2 as $campo) { ?>
            <div class="mycard">
               <div class="card-img">
                  <img src="img/uploads/<?php echo $campo["pdt_foto"] ?>">
               </div>
               <div class="cont-text">
                  <h1><?php echo $campo["pdt_nome"] ?></h1>
                  <h3>R$<?php echo $campo["pdt_valor"] ?></h3>
               </div>
               <div class="cont-btn">
                  <a href="pg/pgsingle.php?id=<?php echo $campo["id_produto"] ?>">
                     <button>Comprar</button>
                  </a>
               </div>
            </div>
         <?php } ?>

      </div>


     <!-- Cards -->

      <!-- s -->
      <section>

         <div>
            <img width="50" height="50" src="https://img.icons8.com/ios/50/approval--v1.png" alt="approval--v1" />
            <h3>Compra <br> Segura</h3>
         </div>

         <div>
            <img width="64" height="64" src="https://img.icons8.com/laces/64/rating.png" alt="rating" />
            <h3>Satisfação <br> Grantida</h3>
         </div>

         <div>
            <img width="50" height="50" src="https://img.icons8.com/ios/50/lock--v1.png" alt="lock--v1" />
            <h3>Privacidade <br> Protegida</h3>
         </div>
      </section>
      <!-- s -->

      <!--Footer-->
      <footer>
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14712.222928467534!2d-45.177241599999995!3d-22.8003987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ccc5e540ecdf71%3A0xeee409ab71e209a4!2sTRACPEL%20TRATORES%20-%20COM%20DE%20P%C3%87S%20AGRICOLAS%20E%20TERRAPLENAGEM!5e0!3m2!1spt-BR!2sbr!4v1722292427574!5m2!1spt-BR!2sbr" width="500" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

         <div class="cont-footer">

            <h4>Contate-nos!</h4>
            <div class="footer-icons">
            <a href="https://wa.me/+5512982811755?text=Olá%20Estou%20interessado%20em%20saber%20mais%20sobre%20seus%20serviços.">
               <i class="bi bi-whatsapp display-6"></i>
            </a>

               <a href="https://www.instagram.com/tracpeltratores1?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">
                  <i class="bi bi-instagram display-6"></i>
               </a>
               
               <a href="">
                  <i class="bi bi-envelope-at display-6"></i>
               </a>

               <a href="">
                  <i class="bi bi-telephone display-6"></i>
               </a>

            </div>
         </div>
      </footer>
      <!--Footer-->

      
      <script src="./js/bootstrap.bundle.min.js"></script>
      <script src="https://kit.fontawesome.com/89bd153916.js" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="./js/app.js"></script>
   </body>

</html>
    
