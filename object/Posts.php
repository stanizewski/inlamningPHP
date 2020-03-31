<?php

include("../config/database_handler.php");

class Posts {
    private $database_handler;
    private $post_id;

    public function __construct( $database_handler_IN ) {

        $this->database_handler = $database_handler_IN;

    }

    public function setPostId($post_id_IN) {

        $this->post_id = $post_id_IN;

    }

    public function loginUser($username_parameter, $password_parameter){
        $return_object = new stdClass();
    }

    public function fetchSinglePost() {

        $query_string = "SELECT id, title, content, date_posted, user_id FROM posts WHERE id=:post_id";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {
            
            $statementHandler->bindParam(":post_id", $this->post_id);
            $statementHandler->execute();

            return $statementHandler->fetch();



        } else {
            echo "Could not create database statement!";
            die();
        }
    }

    public function fetchAllPosts() {

        $query_string = "SELECT id, title, content, date_posted, user_id FROM posts";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->execute();
            return $statementHandler->fetchAll();

        } else {
            echo "Could not create database statement!";
            die();
        }
        
    }

    public function addPost($title_param, $content_param) {

        $query_string = "INSERT INTO posts (title, content, user_id) VALUES(:title_IN, :content_IN, 1234)";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->bindParam(":title_IN", $title_param);
            $statementHandler->bindParam(":content_IN", $content_param);
            
            $success = $statementHandler->execute();

            if($success === true) {
                echo "OK!";
            } else {
                echo "Error while trying to insert post to database!";
            }

        } else {
            echo "Could not create database statement!";
            die();
        }
    }

}


?>