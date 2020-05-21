<?php

    require_once('config.php');
    require_once('database.php');
        
    try {
        $pdo = new PDO(DSN, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec(createUserTable());
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }

    $name = $_POST['name'];
    if (preg_match('/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}+\z/i', $_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    } else {
        echo "Make sure it's at least 8 characters including a number AND a lowercase letter. ";
        return false;
    }

    $stmt = $pdo->prepare(findUserByUsername());
    $stmt->execute([$name]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!isset($row['name'])) {
        $stmt = $pdo->prepare(insertUser());
        $stmt->execute([$name, $password]);
        echo 'registered!';
    } else {
        echo 'name, '. $name . ', is already used.';
        return false;
    }

?>