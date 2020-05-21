<?php

    function createUserTable() {
        return
            "CREATE TABLE IF NOT EXISTS user(
                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255),
                password VARCHAR(255),
                CREATED TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
            )";
    }

    function findUserByUsername() {
        return "SELECT name FROM user WHERE name = ?";
    }

    function insertUser() {
        return "INSERT INTO user(name, password) value(?, ?); ";
    }

?>