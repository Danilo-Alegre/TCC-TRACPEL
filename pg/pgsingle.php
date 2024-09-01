<?php



require_once "conexao.php";
$conexao = novaConexao();

$id = $_GET["id"];
//consulta da tabela usuários
$sql = "SELECT * FROM tblProduto WHERE id_produto =  $id";
$stmt = $conexao->prepare($sql);
$stmt->execute();
//armazena o resultado da consulta no vetor resultado
$resultado = $stmt->fetch();



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $resultado["pdt_nome"] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/base.css">
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
            <a href="carrinhonovo.html" class="nav-icons">
                <img width="48" height="48" src="../img/carrinho-de-compras .png" alt="shopping-cart--v2" />
             </a>
             <a href="login.php" class="nav-icons">
                <img width="48" height="48" src="https://img.icons8.com/pulsar-color/48/user.png" alt="user" />
             </a>

            <a onclick="abrirNav()" class="ham">
                <i class="bi bi-list"></i>
            </a>
        </div>



    </nav>



    <div class="cont-op">

        <div class="op">

            <a href="pg/teste.php">
                <h5 class="color1">Todos os Departamentos</h5>
            </a>
            <a href="">
                <h5>Tratores</h5>
            </a>
            <a href="">
                <h5>Colheitadeiras</h5>
            </a>
            <a href="">
                <h5>Terraplenagem</h5>
            </a>
            <a href="">
                <h5 class="color2">Sobre nós</h5>
            </a>



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
                <a href="carrinhonovo.html" class="nav-icons-mobile">
                    <img width="48" height="48" src="../img/carrinho-de-compras .png" alt="shopping-cart--v2" />
                 </a>
                 <a href="login.php" class="nav-icons-mobile">
                    <img width="48" height="48" src="https://img.icons8.com/pulsar-color/48/user.png" alt="user" />
                 </a>

            </div>
        </div>



        <div class="cont-op">

            <div class="op-mobile">



                <a href="">
                    <h5 class="color1">Todos os Departamentos</h5>
                </a>
                <a href="">
                    <h5>Tratores</h5>
                </a>
                <a href="">
                    <h5>Colheitadeiras</h5>
                </a>
                <a href="">
                    <h5>Terraplenagem</h5>
                </a>
                <a href="">
                    <h5 class="color2">Sobre nós</h5>
                </a>

            </div>
        </div>


    </div>




</header>
<!--Navbar-->

<body>


    <div class="cont">

        <!--Imagem Produto-->
        <div class="cont-img">
            <figure>
                <img src="../img/uploads/<?php echo $resultado["pdt_foto"] ?>">
            </figure>
        </div>
        <!--Imagem Produto-->

        <!--Titulo Produto-->
        <div class="cont-text">
            <h1><?php echo $resultado["pdt_nome"] ?></h1>
            <h2>R$<?php echo $resultado["pdt_valor"] ?></h2>
            <div class="cont-btn">
                <button>Adicionar ao carrinho <i class="bi bi-cart2"></i> </button>
            </div>
        </div>
        <!--Titulo Produto-->
    </div>


    <div class="cont-desc">
        <div class="desc card">
            <h4>Descrição</h4>

            <p><?php echo $resultado["pdt_desc"] ?></p>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


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