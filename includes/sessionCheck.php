<?php

function checkSession() {
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../login/index.html");
        exit;
    }
}

?>