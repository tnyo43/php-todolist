<?php

    require_once('config.php');
    require_once('database.php');

    try {
        $pdo = new PDO(DSN, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec(createToDoTable());
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }

    session_start();

    try {
        $stmt = $pdo->prepare(insertToDo());
        $stmt->execute([$_SESSION['user_id'], $_POST['title'], $_POST['details'], $_POST['deadline']]);
        echo 'add new todo item!';
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
        return false;
    }
?>
