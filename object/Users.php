
<?php

include("../config/database_handler.php");

 class User {

       private $database_handler;
        private $username;
  


       
      public function __construct($database_handler_parameter_IN)
       {
           $this->database_handler = $database_handler_parameter_IN;
        }

        public function addUser($username_IN, $password_IN) {
            $return_object = new stdClass();


    }

 }


$username =(!empty($_POST['username']) ? $_POST['username'] : "");
$password =(!empty($_POST['password']) ? $_POST['password'] : "");

$getusername = ("SELECT * FROM users WHERE username = '$username'");
$return = $database_handler->prepare($getusername);
$return->execute();

if ($return->rowCount() > 0) {
  echo 'Användarnamnet är upptaget!';
    die;
  } //Detta block körs om användarnamnet är upptaget

$username = htmlspecialchars($username);
$password = htmlspecialchars($password);

$errors = false;
$errorMessages = "";

 if(empty($username)) {
     $errorMessages .="Du måste skriva ett användarnamn <br />";
     $errors = true; 

    } 

 if(empty($password)) {
    $errorMessages .="Du måste skriva ett lösenord <br />";
    $errors = true; 

}


     $username = ($_POST['username']);
     $password = md5($_POST['password']);

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password');";
     $return = $database_handler->exec($query);

   if(!$return){
        print_r($database_handler->errorInfo());

}

/* function loginUser($username_parameter, $password_parameter) {
    $return_object = new stdClass();

    $query_string = "SELECT id, username FROM users WHERE username=:username_IN AND password=:password_IN";
    $statementHandler = $this->database_handler->prepare($query_string);
    
    if($statementHandler !== false) {

        $password = md5($password_parameter);

        $statementHandler->bindParam(':username_IN', $username_parameter);
        $statementHandler->bindParam(':password_IN', $password);

        

        $statementHandler->execute();
        $return = $statementHandler->fetch();

        if(!empty($return)) {

            $this->username = $return['username'];

            // $return_object->token = $this->getToken($return['id'], $return['username']);
            // return json_encode($return_object);
        } else {
            echo "fel login";
        }

        

    } else {
        // echo "Could not create a statementhandler";
        header("location:../index.php");
        

}
 
} */
?>