<?php
    // user table

    function createUserTable() {
        return
            "CREATE TABLE IF NOT EXISTS user(
                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255),
                password VARCHAR(255),
                created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
            )";
    }

    function findUserByUsername() {
        return "SELECT * FROM user WHERE name = ?";
    }

    function insertUser() {
        return "INSERT INTO user(name, password) value(?, ?); ";
    }

?>

<?php
    // todo table

    function createToDoTable() {
        return
            "CREATE TABLE IF NOT EXISTS todo(
                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                user_id INT,
                title VARCHAR(255),
                details VARCHAR(255),
                deadline TIMESTAMP,
                created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
            )";
    }

    function findToDoByUserId() {
        return "SELECT * FROM todo WHERE user_id = ?;";
    }

    function findToDoByIdANDUserId() {
        return "SELECT * FROM todo WHERE id = ? AND user_id = ?;";
    }

    function insertToDo() {
        return "INSERT INTO todo(user_id, title, details, deadline) value(?, ?, ?, ?);";
    }

    function updateToDo() {
        return "UPDATE todo SET title = ?, details = ?, deadline = ? WHERE id = ? AND user_id = ?;";
    }

    function deleteToDo() {
        return "DELETE FROM todo WHERE id = ? AND user_id = ?;";
    }

?>