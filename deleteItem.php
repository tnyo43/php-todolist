<?php

    require_once('config.php');
    require_once('database.php');

    session_start();

    try {
        $pdo = new PDO(DSN, DB_USER, DB_PASS);
        $stmt = $pdo->prepare(deleteToDo());
        $stmt->execute([$_GET['id'], $_SESSION['user_id']]);
        echo 'delete todo item!';
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
        return false;
    }

?>
