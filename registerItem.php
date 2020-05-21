<?php
    $pageTitle = 'register item';
    require('head.php');
?>

<body>
    <?php
        require('header.php');
    ?>

    <h1>add new item</h1>
    <form action="addItem.php" method="post">
    <label for="title">title</label>
    <input name="title"><br />
    <label for="details">details</label>
    <input name="details"><br />
    <label for="deadline">deadline</label>
    <input type="datetime-local" name="deadline"><br />
    <button type="submit">add</button>
</body>
</html>

