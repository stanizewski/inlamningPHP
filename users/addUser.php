<?php

    include("../object/Users.php");
    

    $user_handler = new User($database_handler);

    echo $user_handler->addUser($_POST['username'], $_POST['password']);


?>