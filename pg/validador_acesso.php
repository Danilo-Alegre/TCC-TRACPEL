<?php
session_start();
//se não está setado a session ou
//se não é igual a sim, usuário não logou
if (!isset($_SESSION["logado"]) || $_SESSION["logado"] == 'nao') {
    //direciona navegador p página index
    header("Location: login.php?login=erro2");
    exit();
}
?>