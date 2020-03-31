<?php
    include("../config/database_handler.php");
    include("../object/login.php");

    $user_handler = new Login($database_handler);

    print_r($user_handler->loginUser($_POST['username'], $_POST['password']));
    


?>