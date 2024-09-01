 <?php

    // armazena na variável o nome do usuário logado que está armazenado na session
    $usuario =  $_SESSION['usuario'];

    if ($_SESSION['logado'] != 'sim' || $_SESSION['categoria'] != 1) {
        header('Location: main.php?acesso=negado');
        exit;
    }


    ?>

 <!DOCTYPE html>
 <html lang="pt-BR">

 <head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Gerente</title>
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="../css/gerente.css" />
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
 </head>

 <header>


     <nav class="nav-pc">
         <div class="logo">
             <img src="../img/logoTracpel.png" alt="" />
         </div>

         <div class="cont-search">
             <form role="search">
                 <button class="input-group-text"><i class="bi bi-search"></i></button>
                 <input class="form-control" type="search" placeholder="O que você procura?" aria-label="Search" />
             </form>
         </div>

         <div class="icons display-6">

             <h5 class="nav-icons"><?php echo $usuario ?></h5>

             <a onclick="abrirNav()" class="ham">
                 <i class="bi bi-list"></i>
             </a>
         </div>
     </nav>

     <div class="cont-op">
         <div class="op">
             <a href="#" class="adic-btn" onclick="cardAdic()">
                 <h5>Adicionar Peças</h5>
             </a>
             <a href="#" class="cli-btn" onclick="cardCli()">
                 <h5>Clientes</h5>
             </a>
             <a href="#" class="edit-btn" onclick="cardEdit()">
                 <h5>Editar Peças</h5>
             </a>
             <!-- <a href="#" class="ger-btn" onclick="cardGerente()">
                <h5>Adicionar Gerente</h5>
            </a> -->
             <a href="logoff.php">
                 <h5 class="color2">Sair</h5>
             </a>
         </div>
     </div>


     <div class="nav-mobile">
         <div class="cont-bar-mobile">
             <form role="search">
                 <div class="cont-search-mobile">
                     <button class="input-group-text">
                         <i class="bi bi-search"></i>
                     </button>
                     <input class="form-control" type="search" placeholder="O que você procura?" aria-label="Search" />
                 </div>
             </form>

             <div class="icons-mobile display-6">

                 <h5 class="nav-icons-mobile"><?php echo $usuario ?></h5>

             </div>
         </div>

         <div class="cont-op">
             <div class="op-mobile">
                 <a href="#" class="adic-btn" onclick="cardAdic()">
                     <h5>Adicionar Peças</h5>
                 </a>
                 <a href="#" class="cli-btn" onclick="cardCli()">
                     <h5>Clientes</h5>
                 </a>
                 <a href="#" class="edit-btn" onclick="cardEdit()">
                     <h5>Editar Peças</h5>
                 </a>
                 <!-- <a href="#" class="ger-btn" onclick="cardGerente()">
                <h5>Adicionar Gerente</h5>
            </a> -->
                 <a href="logoff.php">
                     <h5 class="color2">Sair</h5>
                 </a>
             </div>
         </div>
     </div>

 </header>

 <body>

     <!-- Card Adicionar -->

     <?php

        if (count($_POST) > 0) {

            require_once "conexao.php";

            $conexao = novaConexao();

            if (isset($_FILES["imagem"]) && !empty($_FILES["imagem"])) {
                $imagem = $_FILES["imagem"]["name"];
                $imagepath = "../img/uploads/" . $_FILES["imagem"]["name"];
                move_uploaded_file($_FILES["imagem"]["tmp_name"], $imagepath);
            } else {
                $imagem = "";
            }

            try {
                //monta a sql
                $sql = "INSERT INTO tblProduto(pdt_codigo, pdt_nome, pdt_foto, pdt_valor, pdt_desc, pdt_dest, pdt_lanc) VALUES (:codigo, :nome, :imagem, :valor, :descricao, :destaque, :lancamento)";
                $stmt = $conexao->prepare($sql);
                $stmt->bindValue(':codigo', $_POST['codigo']);
                $stmt->bindValue(':nome', $_POST['nome']);
                $stmt->bindValue(':imagem', $imagem);
                $stmt->bindValue(':valor', $_POST['valor']);
                $stmt->bindValue(':descricao', $_POST['descricao']);
                $stmt->bindValue(':destaque', $_POST['destaque']);
                $stmt->bindValue(':lancamento', $_POST['lancamento']);
                $stmt->execute();
                $resultado = $stmt->fetch();
            } catch (PDOException $e) {
                echo 'Erro: ' . $e->getCode() . ' Mensagem: ' . $e->getMessage();
            }
        }

        ?>


     <div class="cards-adic">
         <div class="adic">
             <div id="adiciona">
                 <div class="card-header">
                     <h1 class="display-4 mt-3">Adicionar Peça</h1>
                 </div>
                 <form action="#" method="post" enctype="multipart/form-data">
                     <div class="card-body">
                         <div class="cont-form">
                             <label for="nome">Nome</label>
                             <input type="text" name="nome" class="form-control" placeholder="Digite o Nome da Peça" required />

                             <label for="codigo">Código</label>
                             <input name="codigo" class="form-control" aria-label="Código" placeholder="Digite o Código da Peça" required />

                             <label for="imagem">Imagem</label>
                             <input name="imagem" type="file" class="form-control" aria-label="Imagem" placeholder="Insira a Imagem Peça" accept="image/*" multiple accept=".jpg,.jpeg,.png" required />

                             <label for="valor">Valor</label>
                             <input id="valor" class="form-control" name="valor" placeholder="Insira o valor da Peça" required />


                             <div class="cont-choose">


                                 <div class="choose">
                                     <label for="Destaque">Destaque</label>
                                     <div class="cont-radio">
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="destaque" value="1" id="flexCheckDefault1">
                                             <label class="form-check-label" for="flexCheckDefault1">
                                                 Sim
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="destaque" value="2" id="flexRadioDefault2">
                                             <label class="form-check-label" for="flexRadioDefault2">
                                                 Não
                                             </label>
                                         </div>
                                     </div>
                                 </div>


                                 <div class="choose">
                                     <label for="Lancamentos">Lançamentos</label>
                                     <div class="cont-radio">
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="lancamento" value="1" id="flexCheckDefault1">
                                             <label class="form-check-label" for="flexCheckDefault1">
                                                 Sim
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="lancamento" value="2" id="flexRadioDefault2">
                                             <label class="form-check-label" for="flexRadioDefault2">
                                                 Não
                                             </label>
                                         </div>
                                     </div>
                                 </div>
                             </div>


                             <label for="descricao">Descrição</label>
                             <textarea name="descricao" class="form-control" placeholder="Digite a Descrição da Peça" required></textarea>

                             <button type="submit">
                                 Adicionar Peça <i class="bi bi-plus-circle-fill"></i>
                             </button>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>

     <!-- Card Adicionar -->


     <!-- Card Clientes -->

     <?php


        try {
            require_once '../config/conexao.php';
            $conexao = novaConexao();;

            /* listar registros da tabela cliente */
            $sqlCliente = 'SELECT * FROM tblUsuario';
            $cmdCliente = $conexao->query($sqlCliente);
            $cmdCliente->execute();
            /* array da tabela cliente */
            $resCliente = $cmdCliente->fetchAll(PDO::FETCH_ASSOC);

            if (count($resCliente) > 0) {
                $mensagem = 'true'; // Define uma variável para a mensagem
            } else {
                $mensagem = 'false'; // Define uma variável para a mensagem
            }
        } catch (PDOException $e) {
            echo 'Mensagem de ERRO: ' . $e->getMessage();
        }

        ?>

     <div class="cards-cli">

         <div class="cli">
             <div id="cliente">
                 <div class="card-header">
                     <h1 class="display-4 mt-3">Ver Clientes</h1>
                 </div>
                 <div class="card-body">
                     <table class="table table-striped">
                         <thead>
                             <tr>
                                 <th scope="col">idCliente</th>
                                 <th scope="col">Nome</th>
                                 <th scope="col">CPF</th>
                                 <th scope="col">Telefone</th>
                                 <th scope="col">Endereço</th>
                                 <th scope="col">CEP</th>
                                 <th scope="col">Email</th>
                                 <th scope="col">Categoria</th>
                             </tr>
                         </thead>
                         <tbody>

                             <?php

                                if ($mensagem == 'true') {
                                    //----- LISTA AS LINHAS(REGISTROS) EM UMA TABELA -----
                                    for ($i = 0; $i < count($resCliente); $i++) {
                                        //Pega os registros presentes na matriz $resCliente
                                        echo '<tr>';
                                        foreach ($resCliente[$i] as $key => $value) {
                                            if ($key != 'usu_senha' && $key != 'cliIdCidade' && $key != 'cliCpf' && $key != 'cliSenha') {
                                                echo '<td>' . $value . '</td>';
                                            }
                                        }
                                        echo '</tr>';
                                    }
                                } else {
                                ?>

                                 <tr>
                                     <p><b>----- NÃO POSSUI NENHUM CLIENTE -----<b></p>
                                 </tr>
                             <?php
                                }
                                ?>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>

     </div>
     <!-- Card Clientes -->


     <!-- Card Editar Peças -->


     <?php

        require_once "../config/conexao.php";
        $conexao = novaConexao();

        //consulta da tabela prosutos
        $resultadoPec = array();
        $sql = "SELECT * FROM tblProduto order by id_produto desc";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        //armazena o resultado da consulta no vetor resultado
        $resultadoPec = $stmt->fetchAll(PDO::FETCH_ASSOC);

        ?>


     <div class="cards-edit">
         <div class="edit">

             <div id="editar">

                 <div class="card-header">
                     <h1 class="display-4">Editar Peças</h1>
                 </div>
                 <div class="card-body">

                     <div class="cont">

                         <?php
                            foreach ($resultadoPec as $campo) { ?>
                             <div class="mycard">
                                 <div class="card-img">
                                     <img src="../img/uploads/<?php echo $campo["pdt_foto"] ?>">
                                 </div>
                                 <div class="cont-text">
                                     <h1><?php echo $campo["pdt_nome"] ?></h1>
                                     <h3>R$<?php echo $campo["pdt_valor"] ?></h3>
                                 </div>
                                 <div class="cont-btn">
                                     <a href="editarpecas.php?id=<?php echo $campo["id_produto"] ?>">
                                         <button>Editar</button>
                                     </a>
                                 </div>
                             </div>
                         <?php } ?>

                     </div>

                 </div>
             </div>
         </div>
     </div>



     <!-- Card Editar Peças -->


     <!-- Card cardGerente -->

     <!-- <div class="cards-ger">

        <div class="ger">
            <div id="gerente">
                <div class="card-header">
                    <h1 class="display-4 mt-3">Adicionar Gerentes</h1>
                </div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>

    </div> -->


     <!-- Card cardGerente -->


     <?php require_once '../utils/footerPg.php' ?>