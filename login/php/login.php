<?php

session_start();

require_once('connect.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST['email']) or !empty($_POST['password'])){

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $email = sanitizeInput($email);

        $password = sanitizeInput($_POST["password"]);

        $blocked_characters = ["'", '"', ';', '-', '*', '/', '#', '|', '=', '$', '_', ':', '%'];

        if(blockedChar($password, $blocked_characters)){
            header("Location: ../index.php?Error=Blocked_characters_detected");
            exit;
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "SELECT * FROM userlogin WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch();

            if($user){
                if(!empty($user['password'])){
                    if(password_verify($password, $user['password'])){
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['user_email'] = $user['email'];
                        
                        header("Location: ../main/index.php");
                        exit;
                    } else {
                        header("Location: ../index.php?Error=Invalid_password");
                        exit;
                    }
                }
            }
        }


    } else {
        header("location: ../index.php?Error=email_or_password_is_empty!");
        exit;
    }
} else {
    header("location: ../index.php?Error=Request_method_was_not_post!");
    exit;
}

function blockedChar($password, $blocked_characters){
    foreach($blocked_characters as $char){
        if(strpos($password, $char) !== false){
            return true;
        }
    }
    return false;
}

function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>