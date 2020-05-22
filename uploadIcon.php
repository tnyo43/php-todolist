<?php

    require_once('config.php');
    require_once('database.php');

    $pdo = new PDO(DSN, DB_USER, DB_PASS);
    $stmt = $pdo->prepare(findUserByUsername());
    $stmt->execute([$name]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (isset($_FILES['upfile']) && is_uploaded_file($_FILES['upfile']['tmp_name'])) {
        $saved_name =  'upload/' . date("YmdHis") . mt_rand();
        switch (exif_imagetype($_FILES['upfile']['tmp_name'])) {
        case IMAGETYPE_JPEG :
            $saved_name .= '.jpg';
            break;
        case IMAGETYPE_GIF :
            $saved_name .= '.gif';
            break;
        case IMAGETYPE_PNG :
            $saved_name .= '.png';
            break;
        default :
            header('Location: mypage.php');
            exit;
        }

        if (!move_uploaded_file($_FILES['upfile']['tmp_name'], $saved_name)) {        
            echo 'upload faild';
            return false;
        }
    }

    session_start();

    if (!is_null($_SESSION['icon'])) {
        unlink($_SESSION['icon']);
    }

    $stmt = $pdo->prepare(updateIcon());
    $stmt->execute([$saved_name, $_SESSION['user_id']]);
    $_SESSION['icon'] = $saved_name;

    echo'upload successed!';

?>