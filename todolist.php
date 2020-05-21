<?php

    require_once('config.php');
    require_once('database.php');

    session_start();

    try {
        $pdo = new PDO(DSN, DB_USER, DB_PASS);
        $stmt = $pdo->prepare(findToDoByUserId());
        $stmt->execute([$_SESSION['user_id']]);
        $items = $stmt;
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
        return false;
    }

?>

<!DOCTYPE html>
<htm>
<head>
    <meta charset="utf-8">
    <title>List</title>
</head>
<body>
    <table>
        <tr>
            <th>title</th>
            <th>details</th>
            <th>deadline</th>
        </tr>
        <?php
            foreach ($items as $item) {
                echo "<tr>
                        <td>{$item['title']}</td>
                        <td>{$item['details']}</td>
                        <td>{$item['deadline']}</td>
                    </tr>";
            }
        ?>
    </table>
</body>
</html>