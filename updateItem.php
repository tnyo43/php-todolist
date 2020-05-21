<?php

    require_once('config.php');
    require_once('database.php');

    session_start();

    try {
        $pdo = new PDO(DSN, DB_USER, DB_PASS);
        $stmt = $pdo->prepare(updateToDo());
        $stmt->execute([$_POST['title'], $_POST['details'], $_POST['deadline'], $_GET['id']]);
        echo 'update todo item';
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
        return false;
    }
?>
