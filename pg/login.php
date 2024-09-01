<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">


</head>
<body>

    <main class="conteudo">
        <div class="tittle text-white">
            <h1>Olá <br> Seja Bem vindo  <i class="fa-solid fa-tractor"></i></h1>
        </div>
        <form action="valida_login.php" method="post">
        <div class="card-cad">

            <div class="cont-cad">
                
                <h1>Login</h1>
                
                <div class="textField">
                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="Digite seu e-mail">
                    <div class="j"></div>
                </div> 
                <div class="textField">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" placeholder="Digite sua senha">
                </div>
              

                 <?php
        
        
                if(isset($_GET['login']) && ($_GET['login'] == 'erro')) 
                { ?>
                    <div class="text-danger">
                        Usuário ou senha inválido(s)
                    </div>
                    <?php
                }
            ?>
            
            <?php
            if(isset($_GET['login']) && ($_GET['login'] == 'erro2')) 
            { ?>
                <script>
                      alert('Faça Login para acessar essa página');
                    </script>
                <?php
            }
            ?> 


                <button class="btn-cadastrar">Confirmar</button>
                
                <address class="text-center text-white">
                    
                    Não tem uma conta?<a href="./cadastro.php"> clique aqui </a>
                    
                </address>
                
            </div>
            
        </div>
        </form>
    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      <script src="https://kit.fontawesome.com/89bd153916.js" crossorigin="anonymous"></script>
</body>
</html>