<?php

$nameError = '';
$paymentError = '';
$name = '';
$payment = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $i = 0;
    $name = $_POST['name'];
    $payment = $_POST['payment'];

    if (empty($name)) {
        $i++;
        $nameError = 'Your name is empty';
    }

    if (empty($payment)) {
        $i++;
        $paymentError = 'Your payment is empty';
    }

    if ($i === 0) {
        include_once('connec.php.dist');
        try {
            $pdo = new PDO(DSN, USER, PASS);
        } catch (Exception $exception) {
            echo "Problème de connexion à la base de donnée";
        }

        $query = 'INSERT INTO bribe (name, payment) VALUES (:name, :payment)';
        $statement = $pdo->prepare($query);
        $statement->bindValue(':name', $name, PDO::PARAM_STR);
        $statement->bindValue(':payment', $payment, PDO::PARAM_STR);

        $statement->execute();
        header("Location: book.php");


        echo 'Your payment has been added';
    }

}