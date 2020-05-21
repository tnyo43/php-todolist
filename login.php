<?php

    require_once('config.php');
    require_once('database.php');

    define (MSG_LOGIN_FAIL, 'either user name or password is wrong.');

    session_start();

    $name = $_POST['name'];

    try {
        $pdo = new PDO(DSN, DB_USER, DB_PASS);
        $stmt = $pdo->prepare(findUserByUsername());
        $stmt->execute([$name]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }

    if (!isset($row['name'])) {
        echo MSG_LOGIN_FAIL;
        return false;
    }

    if (password_verify($_POST['password'], $row['password'])) {
        session_regenerate_id(true);
        $_SESSION['name'] = $name;
        echo 'login!';
    } else {
        echo MSG_LOGIN_FAIL;
        return false;
    }

?>