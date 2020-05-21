<?php

    session_start();

    if (isset($_SESSION['name'])) {
        echo 'Welcome, ' .  htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'utf-8') . "!<br>";
        echo "<a href='/logout.php'>logout</a>";
        exit;
    }

?>

<?php
    $pageTitle = 'sign in';
    require('head.php');
?>

<body>
    <?php
        require('header.php');
    ?>

    <h1>sign in</h1>
    <form  action="login.php" method="post">
        <label for="name">name</label>
        <input type="name" name="name">
        <label for="password">password</label>
        <input type="password" name="password">
        <button type="submit">sign in</button>
    </form>
    <h1>sign up</h1>
        <form action="signUp.php" method="post">
        <label for="name">name</label>
        <input type="name" name="name">
        <label for="password">password</label>
        <input type="password" name="password">
        <button type="submit">sign up</button>
        <p>Make sure it's at least 8 characters including a number AND a lowercase letter.</p>
    </form>
</body>
</html>