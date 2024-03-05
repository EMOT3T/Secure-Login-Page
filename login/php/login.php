<?php
session_start();

require_once('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $email = sanitizeInput($email);

        $password = sanitizeInput($_POST["password"]);

        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user) {
            if (!empty($user['password'])) {
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_email'] = $user['email'];
                    $_SESSION['user_level'] = $user['user_level'];

                    header("Location: ../../main/Pages/dashboard/index.php");
                    exit;
                } else {
                    header("Location: ../index.html?Error=Invalid_password");
                    exit;
                }
            }
        } else {
            header("Location: ../index.html?Error=User_not_found");
            exit;
        }
    } else {
        header("Location: ../index.html?Error=Email_or_password_is_empty");
        exit;
    }
} else {
    header("Location: ../index.html?Error=Request_method_was_not_post");
    exit;
}

function sanitizeInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}
?>
