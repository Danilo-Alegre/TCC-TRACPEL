<?php


if (count($_POST) > 0) {

    require_once "conexao.php";

    $conexao = novaConexao();

    $sql_cli_email = "SELECT * FROM tblUsuario WHERE usu_email = :email";
    $cli_email = $conexao->prepare($sql_cli_email);
    $cli_email->bindValue(':email', $_POST['email']);
    $cli_email->execute();
    $verif_cli_email = $cli_email->fetch();



    if ($verif_cli_email['usu_email'] !== $_POST['email']) {

        try {
            //monta a sql
            $sql = "INSERT INTO tblUsuario(usu_nome, usu_cpf, usu_telefone, usu_endereco, usu_cep, usu_categoria, usu_email, usu_senha) VALUES (:nome, :cpf, :telefone, :endereco, :cep, :cat, :email, :senha)";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':nome', $_POST['nome']);
            $stmt->bindValue(':cpf', $_POST['cpf']);
            $stmt->bindValue(':telefone', $_POST['telefone']);
            $stmt->bindValue(':endereco', $_POST['endereco']);
            $stmt->bindValue(':cep', $_POST['cep']);
            $stmt->bindValue(':cat', '2');
            $stmt->bindValue(':email', $_POST['email']);
            $stmt->bindValue(':senha', $_POST['senha']);
            $stmt->execute();
            echo "Registro cadastrado com sucesso!";
            header('Location: cadastro.php');
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getCode() . ' Mensagem: ' . $e->getMessage();
        }
    } else if ($verif_cli_email['usu_email'] == $_POST['email']) {
        header('Location: cadastro.php?erro_email');
    }
}


?>




<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/cadastro.css">
    <title>Cadastro</title>
</head>

<body>

    <?php
    if (isset($_GET['cadastro']) && ($_GET['cadastro'] == 'erro_email')) {
    ?>
        <script>
            alert('Esse endereço de email já existe');
        </script>
    <?php
    } ?>



    <form action="#" method="post">
        <main class="conteudo">



            <div class="card-cad">

                <h1>Cadastro</h1>

                <div class="textField px-2">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" placeholder="Digite seu nome" required>
                </div>
                <div class="line">

                    <div class="textField px-2">
                        <label for="cpf">CPF</label>
                        <input type="text" id="cpf" name="cpf" placeholder="Digite seu CPF" required>
                    </div>
                    <div class="textField px-2">
                        <label for="telefone">Telefone</label>
                        <input type="text" id="telefone" name="telefone" placeholder="Digite seu Telefone" required>
                    </div>
                </div>


                <div class="textField px-2">
                    <label for="endereco">Endereço</label>
                    <input type="text" name="endereco" placeholder="Digite seu Endereço" required>
                </div>




                <div class="line">
                    <div class="textField px-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Digite seu Email" required>
                    </div>

                    <div class="textField px-2">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" placeholder="Digite sua Senha" required>
                    </div>
                </div>

                <button>Confirmar</button>






                <address class="text-center text-white">

                    Já tem uma conta?<a href="./login.php"> clique aqui </a>

                </address>

            </div>


        </main>
    </form>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script>
        $('#cpf').mask('000.000.000-00', {
            reverse: true
        });
        $('#telefone').mask('(00) 00000-0000');
        $('#cep').mask('00000-000');
    </script>



    <script src="./js/bootstrap.bundle.min.js"></script>

</body>

</html>