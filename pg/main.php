<?php  

require_once "validador_acesso.php";

if (isset($_SESSION["categoria"])) {
    $cat = $_SESSION["categoria"];

    if($cat == 1){
        require_once './gerente.php';
    } else if($cat == 2){
        require_once './home.php';
    }

}

?>
