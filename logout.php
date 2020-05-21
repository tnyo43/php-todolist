<?php

    session_start();

    if (isset($_SESSION['name'])) {
        echo 'logged out!';
    } else {
        echo 'session timeout';
    }

    $_SESSION = array();
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcooikie(session_name(), '', time() - 42000,
            $params['path'], $params['domain'],
            $params['secure'], $params['httponly']
        );
    }

    @session_destroy();

?>