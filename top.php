<?php

    session_start();

    //ログイン済みかを確認
    if (!isset($_SESSION['USER'])) {
        header('Location: index.php');
        exit;
    }

    //ログアウト機能
    if(isset($_POST['logout'])){
    
        $_SESSION = [];
        session_destroy();

        header('Location: index.php');
        exit;
    }

?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewpoint" content="width=device-width">
    <title>トップ画面</title>
    <link rel="stylesheet" href="css/style.css">
</head>
 
<body>
<div class="form-wrapper">
    <h1>トップ画面</h1>
    
    <form method="post" action="top.php">
        <p align="center"><?php echo $_SESSION['USER'] ?>さんでログイン中</p>
    
        <div class="button-panel">
            <input type="submit" class="button" name="logout" value="ログアウト">
        </div>
    </form>
    <div class="form-footer"></div>
</div>
</body>
</html>