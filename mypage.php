<?php

    require_once('config.php');
    require_once('database.php');

    session_start();

    if (empty($_SESSION['user_id'])) {
        header('Location: signIn.php');
        exit;
    }

    try {
        $pdo = new PDO(DSN, DB_USER, DB_PASS);
        $stmt = $pdo->prepare(findUserById());
        $stmt->execute([$_SESSION['user_id']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
        return false;
    }

    if (!isset($user['id'])) {
        header('Location: signIn.php');
        exit;
    }

?>

<?php
    session_start();

    $pageTitle = 'mypage';
    require('head.php');
?>

<body>
    <?php
        require('header.php');
    ?>

    <form action="uploadIcon.php" method="post" enctype="multipart/form-data">
        new icon<br />
        <input type="file" name="upfile"/>
        <input type="submit" value="upload" />
    </form>

</body>
</html>