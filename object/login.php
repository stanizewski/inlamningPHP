<?php 

include("../config/database_handler.php");
class Login {

    private $database_handler;
     private $username;



    
   public function __construct($database_handler_parameter_IN)
    {
        $this->database_handler = $database_handler_parameter_IN;
     }
     public function loginUser($username_parameter, $password_parameter){
        $return_object = new stdClass();


 }

}



    $query_string = "SELECT id, username FROM users WHERE username=:username_IN AND password=:password_IN";
    $statementHandler = $database_handler->prepare($query_string);
    
//  $return->execute();

    if($statementHandler !== false) {

        /* $password = md5($password_parameter); */

        $statementHandler->bindParam(':username_IN', $username_parameter);
        $statementHandler->bindParam(':password_IN', $password);

        

        $statementHandler->execute();
        $return = $statementHandler->fetch();

        if(!empty($return)) {

            $this->username = $return['username'];

          
       
    }
    $username    = (!empty($_POST['username']) ? $_POST['username'] : "");
    $password      = (!empty($_POST['password']) ? $_POST['password'] : "");
    
    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);
    
    $errors = false;
    $errorsMessages = "";
    
    if (empty($username)) {
        $errorsMessages .= "Du måste skriva användarnamn! <br />";
        $errors = true;
    }
    
    if (empty($password)) {
        $errorsMessages .= "Du måste skriva ett lösenord! <br />";
        $errors = true;
    }
    

    /*slut på block */
    
    print_r($_POST);
    
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    
    $query = "SELECT id, username password FROM users WHERE username='$username' AND password='$password'";/*query returnerar en array med värdet från databasen*/
    
    $return = $database_handler->query($query);
    
    $row = $return->fetch(PDO::FETCH_ASSOC);
    
   /*  if(empty($row)){
        
       
    
    } else {
        echo "Du kan logga in";

    
    }
}*/

    }
?>