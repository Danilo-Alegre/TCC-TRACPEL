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
    <title>Editar Peça</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/editarpeca.css">
</head>

<body>

<?php

    if (count($_POST) > 0) {

        require_once "conexao.php";

        $conexao = novaConexao();

        if (isset($_FILES["imagem"]["name"]) && !empty($_FILES["imagem"]["name"])) {
            $imagem = $_FILES["imagem"]["name"];
            $imagepath = "../img/uploads/" . $_FILES["imagem"]["name"];
            move_uploaded_file($_FILES["imagem"]["tmp_name"], $imagepath);

            
            $sql = "UPDATE tblProduto SET pdt_codigo = :codigo, pdt_nome = :nome, pdt_foto = :imagem, pdt_valor = :valor, pdt_desc = :descricao, pdt_dest = :destaque WHERE id_produto = $id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':codigo', $_POST['codigo']);
            $stmt->bindValue(':nome', $_POST['nome']);
            $stmt->bindValue(':imagem', $imagem);
            $stmt->bindValue(':valor', $_POST['valor']);
            $stmt->bindValue(':descricao', $_POST['descricao']);
            $stmt->bindValue(':destaque', $_POST['destaque']);
            $stmt->execute();
            $resultado = $stmt->fetch();
        } else {
            $imagem = "";
        }

                //monta a sql
            }
  
    ?>


    <div class="mymodal">

        <h1 class="display-5">Editar Peça</h1>

        <form action="#" method="post" enctype="multipart/form-data">

            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" placeholder="<?php echo $resultado["pdt_nome"] ?>">

            <div class="cont-input">
                <div class="cont-input1">
                    <label for="codigo">Código</label>
                    <input name="codigo" class="form-control" aria-label="Código" placeholder="<?php echo $resultado["pdt_codigo"] ?>"/>
                </div>

                <div class="cont-input2">
                    <label for="valor">Valor</label>
                    <input id="valor" class="form-control" name="valor" placeholder="<?php echo $resultado["pdt_valor"] ?>"/>
                </div>
            </div>




            <label for="imagem">Imagem</label>
            <input name="imagem" type="file" class="form-control" aria-label="Imagem" placeholder="Insira a Imagem Peça"
                accept="image/*" multiple accept=".jpg,.jpeg,.png" />




            <div class="cont-choose">


                <div class="choose">
                    <label for="Destaque">Destaque</label>
                    <div class="cont-radio">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="destaque" value="1"
                                id="flexCheckDefault1">
                            <label class="form-check-label" for="flexCheckDefault1">
                                Sim
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="destaque" value="2"
                                id="flexRadioDefault2">
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
                            <input class="form-check-input" type="radio" name="lancamento" value="1"
                                id="flexCheckDefault1">
                            <label class="form-check-label" for="flexCheckDefault1">
                                Sim
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="lancamento" value="2"
                                id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Não
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <label for="descricao">Descrição</label>
            <textarea name="descricao" class="form-control" placeholder="<?php echo $resultado["pdt_desc"] ?>"></textarea>
    

            <div class="cont-btn">
                <button type="submit">
                    Confirmar <i class="bi bi-plus-circle-fill"></i>
                </button>
                <a href="gerente.php">
                    Voltar <i class="bi bi-plus-circle-fill"></i>
                </a>
            </div>
        </form>

    </div>




</body>

</html>