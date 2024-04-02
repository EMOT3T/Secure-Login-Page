<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: logof.php");
    exit;
} else {
    $id_registrant = $_SESSION['user_id'];

    // EXAMPLE

    // If you are going to develop a system in which it is necessary to save the data of whoever is registering that information, such as: "An Admin is creating a new user or some role. If you need the name, email and any other information, you You can use this code below to be able to pull this data from your database, before taking any action. You can increase this logic in your CRUD, to have control of who and when made any moves/changes to the information in which the person is working"

    // processRegistrantData($pdo, $id_registrant);
}


// function processRegistrantData($pdo, $id_registrant) {

//     $stmt = $pdo->prepare("SELECT user_id, user_email, user_registration, base_id FROM registrants WHERE user_id = :id_registrant");
//     $stmt->bindParam(':id_registrant', $id_registrant);
//     $stmt->execute();
//     $registrant_data = $stmt->fetch(PDO::FETCH_ASSOC);

//     if ($registrant_data) {
//         $creator_user_id = $registrant_data['user_id'];
//         $creator_email = $registrant_data['user_email'];
//         $creator_registration = $registrant_data['user_registration'];
//         $creator_base_id = $registrant_data['base_id'];

//         if (!$creator_user_id) {
//             $insert_stmt = $pdo->prepare("INSERT INTO registrants (user_id, user_email, user_registration, base_id) VALUES (:user_id, :user_email, :user_registration, :base_id)");
//             $insert_stmt->bindParam(':user_id', $id_registrant);
//             $insert_stmt->bindParam(':user_email', $creator_email);
//             $insert_stmt->bindParam(':user_registration', $creator_registration);
//             $insert_stmt->bindParam(':base_id', $creator_base_id);
//             $insert_stmt->execute();
//         }
//     }
// }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Banking System</title>
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="logo">
                <h1>Banking System</h1>
            </div>
            <nav class="navigation">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Transactions</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="logout.php" class="logout-btn">Logout</a></li>
                </ul>
            </nav>
        </header>
        <div class="content">
            <div class="balance">
                <div class="balance-info">
                    <h3>Welcome, Mr. EMOT3T</h3>
                    <p>Your current balance:</p>
                    <h1 id="balanceAmount">$2963.38</h1>
                    <button onclick="withdrawAmount()">Withdraw</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let balance = 2963.38; // Saldo inicial

        function withdrawAmount() {
            // Simulando uma operação de saque
            const amountToWithdraw = parseFloat(prompt("Enter the amount to withdraw:"));
            if (isNaN(amountToWithdraw) || amountToWithdraw <= 0) {
                alert("Invalid amount entered. Please enter a valid amount.");
                return;
            }

            if (balance < amountToWithdraw) {
                alert("Insufficient funds.");
                return;
            }

            balance -= amountToWithdraw;

            // Atualizando o saldo exibido na página
            document.getElementById('balanceAmount').textContent = `$${balance.toFixed(2)}`;
        }
    </script>
</body>
</html>

