<?php

// armazena na variável o nome do usuário logado que está armazenado na session
$usuario =  $_SESSION['usuario'];


if($_SESSION['logado'] != 'sim' || $_SESSION['categoria'] != 2) {
  header('Location: main.php');
  exit;
}


?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shrikhand&display=swap" rel="stylesheet">
</head>

<header>

  <!--Navbar-->
  <?php
  if(isset($_GET['acesso']) && ($_GET['acesso'] == 'negado')) 
            { ?>
                <script>
                      alert('Você não pode acessar essa página');
                    </script>
                <?php
            }
            ?> 
  
  <nav class="navbar navh">


      
      <div class="logo">
        
        
        <a href="#" class="">
          <img src="../img/logoTracpel.png" class="" alt="logo">
        </a>
          <h3 class="font">Tracpel</h3>
        
        
      </div>
      
      
      <div class="cont-op">
        
        
        
        <div class="dropdown-center dropdown text-center op">
          <h5 data-bs-toggle="dropdown">
            Categoria
          </h5>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Máquinas de Terraplenagem</a></li>
            <li><a class="dropdown-item" href="#">Máquinas Agrícolas</a></li>
            <li><a class="dropdown-item" href="#">Máquinas de Colheitadeira</a></li>
          </ul>
        </div>

        <div class="dropdown-center dropdown text-center op">
          <h5 data-bs-toggle="dropdown">
            Peças
          </h5>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Parfusos</a></li>
            <li><a class="dropdown-item" href="#">Porcas</a></li>
            <li><a class="dropdown-item" href="#">Buchas</a></li>
            <li><a class="dropdown-item" href="#">Filtros</a></li>
            <li><a class="dropdown-item" href="#">Dentes</a></li>
          </ul>
        </div>
        
        <div class="dropdown-center dropdown text-center op">
          <h5 data-bs-toggle="dropdown">
            Ferramentas
          </h5>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">a</a></li>
            <li><a class="dropdown-item" href="#">b</a></li>
            <li><a class="dropdown-item" href="#">c</a></li>
          </ul>
        </div>
        
        
        
        <a href="#sobre" class="sobre text-center op">
          <h5>Quem Somos</h5>
      </a> 
      
    </div>
    
    
    
    <div class="cont-nav display-6 dropstart perfil">
      <h5 data-bs-toggle="dropdown">
     <?= $usuario ?>
      </h5>
      <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Configurações <i class="bi bi-gear"></i></a></li>
          <li><a class="dropdown-item" href="logoff.php">Sair <i class="bi bi-box-arrow-left text-danger"></i></a></li>
        </ul>
      
    </div>
    
    
    

  </nav>
</header>

<body>

    <!--Navbar-->
    

   


<!--Opções-->
   

    <!--Opções-->

    <!--Banner-->

    <div class="banner mt-5">
      <h3 class="text-white text-center banner-text">TRACPEL - CONFIANÇA EM  </h3>

      <div class="text-anima">

        <h3  class="text-white  text-center  banner-text">
          CADA PARAFUSO   
        </h3>
          <div class="anima mx-3">
            <i class="bi bi-nut text-white banner-text  text-center "></i>
          </div>
        </div>
      
    </div>



    <!--Banner-->

<div class="text-center mt-5">
    <h1>Categorias Mais Vendidas</h1>
</div>






    <!--Cards-->



  <div class="center mt-5">
    
 
      
      <div class="card card-form anima-card mb-3 " style="width: 18rem;">
        <img src="../img/imgCard1-index.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
      
    <div class="card card-form anima-card mb-3 " style="width: 18rem;">
      <img src="../img/imgCard2-Index.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
    </div>
    
    <div class="card card-form anima-card mb-3" style="width: 18rem;">
      <img src="../img/imgCard3-index.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
    </div>

  
</div>




<div class="text-center mt-5">
    <h1 class="">Mais Procurados</h1>
</div>


<div class="center mt-5">


    
    <div class="">
      <div class="card card-form anima-card mb-3" style="width: 18rem;">
        <img src="../img/imgCard4-index.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
    </div>
    
    
    <div class="">
      <div class="card  card-form anima-card mb-3" style="width: 18rem;">
        <img src="../img/imgCard5-index.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
    </div>
    
    
    <div class="">
      <div class="card card-form anima-card mb-3" style="width: 18rem;">
        <img src="../img/imgCard6-index.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
    </div>
    

</div>
  
  <!----Sobre Nós-->

  <!------->
  <div id="sobre" class="sobreNos p-5 text-center">



    <div class="mt-3">
      
      <h4>Quem Somos?</h4>
      <br>
        <div>
          A TRACPEL é uma loja física especializada em peças e componentes para máquinas agrícolas, especialmente tratores. Localizada em um ponto estratégico da cidade, a TRACPEL tem como foco atender às necessidades dos agricultores e fazendeiros que precisam manter suas máquinas em perfeito funcionamento. Com anos de experiência no setor agrícola, a loja é conhecida pela qualidade de seus produtos e pelo atendimento especializado.

        </div>
        <br>
        <div>
          Recentemente, a TRACPEL expandiu sua atuação com a criação de uma loja virtual, oferecendo ainda mais comodidade para seus clientes. Agora, é possível adquirir parafusos, porcas, rolamentos, correias e outras peças essenciais para tratores sem sair de casa. A loja online foi projetada para ser intuitiva e fácil de usar, permitindo que os clientes encontrem rapidamente o que procuram. Além disso, a TRACPEL oferece diversas formas de pagamento e entrega, garantindo que os produtos cheguem rapidamente ao destino.Nossa missão é simples: a satisfação do cliente. Cada membro da equipe é treinado para oferecer um atendimento personalizado, entendendo as necessidades específicas de cada cliente e sugerindo as melhores soluções. A loja física conta com um ambiente organizado e uma equipe sempre pronta para ajudar, enquanto a loja virtual possui um sistema de atendimento ao cliente por chat e telefone, disponível para responder dúvidas e prestar suporte técnico.
        </div>
        <br>
        <div>
          Além disso, a TRACPEL se destaca pelo compromisso com a qualidade dos produtos. Todas as peças são rigorosamente selecionadas e passam por um controle de qualidade antes de serem disponibilizadas para venda. A loja trabalha apenas com fornecedores confiáveis, garantindo que os clientes recebam peças duráveis e confiáveis para suas máquinas agrícolas. Nós acreditamos que o sucesso de seus clientes é seu próprio sucesso. Por isso, continua investindo em sua equipe, em tecnologia e na expansão de sua loja virtual, sempre com o objetivo de proporcionar uma experiência de compra excelente e uma relação de confiança com seus clientes. Seja na loja física ou online, a TRACPEL é a parceira ideal para manter seus tratores funcionando perfeitamente.
        </div>
        
        <div class="cont-so mt-3">

          <figure>
            <img src="./img/tracpellllll.jpeg" class="img-fluid" alt="">
          </figure>
          
          
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3677.285405738538!2d-45.21467158901611!3d-22.8289279792236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ccc5e540ecdf71%3A0xeee409ab71e209a4!2sTRACPEL%20TRATORES%20-%20COM%20DE%20P%C3%87S%20AGRICOLAS%20E%20TERRAPLENAGEM!5e0!3m2!1spt-BR!2sbr!4v1714063368347!5m2!1spt-BR!2sbr" width="450" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    
    
</div>

</div>

<!--Footer-->
<footer class="mt-5 p-4">
  <div class="row text-center">
        <div class="col-12 col-md-4 mt-5">
          <address class="text-center">
            Contato <br>
            (12) 98281-1755  3127-4335 <br>
              tracpelpecastratores@gmail.c6om 
          </address>
          </div>
  
    
        <div class="col-12 col-md-4 mt-5">
          <a href="#" class="">
            <img src="../img/logoTracpel.png" class="" alt="logo">
          </a>     
        </div>
                   
               
                  
        <div class="col-12 col-md-4 mt-5">
          <h4 class="text-center">
            Redes Sociais <br>
          

              
        
                <a href="https://www.instagram.com/tracpeltratores1?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="footer-icons">
                  <i class="bi bi-instagram text-danger-emphasis "></i>
                </a>
           
              <a href="#" class="footer-icons">
                <i class="bi bi-whatsapp text-success "></i>
              </a>
              <a href="#" class="footer-icons">
                <i class="bi bi-facebook text-primary "></i>
              </a>
              
   
            </h4>
          </div>
    </div>
</footer>
                
                
                <!--Footer-->
                
                <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>