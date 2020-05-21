<?php

    require_once('config.php');
    require_once('database.php');

    session_start();

    try {
        $pdo = new PDO(DSN, DB_USER, DB_PASS);
        $stmt = $pdo->prepare(findToDoByIdANDUserId());
        $stmt->execute([$_GET['id'], $_SESSION['user_id']]);
        $item = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
        return false;
    }

    if (!isset($item['title'])) {
        echo 'invalid request';
        return false;
    }

?>

<?php
    $pageTitle = 'edit item';
    require('head.php');
?>

<body>
    <?php
        require('header.php');
    ?>

    <h1>edit item</h1>
    <form action=<?php echo "updateItem.php?id={$_GET['id']}" ?> method="post">
        <label for="title">title</label>
        <input name="title"><br />
        <label for="details">details</label>
        <input name="details"><br />
        <label for="deadline">deadline</label>
        <input type="datetime-local" name="deadline"><br />
        <button type="submit">edit</button>
    </form>
    <button onclick=<?php echo "location.href='deleteItem.php?id={$_GET['id']}'" ?>>delete</button>
</body>
</html>

