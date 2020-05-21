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

<?php
    session_start();
    if (empty($_SESSION['user_id'])) {
        header('Location: signIn.php');
        exit;
    }

    $pageTitle = 'top';
    require('head.php');
?>

<body>
    <?php
        require('header.php');
    ?>

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
                        <td>
                            <input type=\"button\" onclick=\"location.href='./editItem.php?id={$item['id']}'\" value=\"edit\" />
                        </td>
                    </tr>";
            }
        ?>
    </table>

    
</body>
</html>