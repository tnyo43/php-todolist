<?php

?>

<!DOCTYPE html>
<htm>
<head>
    <meta charset="utf-8">
    <title>register item</title>
</head>
<body>
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

