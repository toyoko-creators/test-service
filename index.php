<?php
    session_start();

    //ログイン済みかを確認
    if (isset($_SESSION['USER'])) {
        header('Location: top.php');
        exit;
    }

    //ログイン機能
    $message = '';
    if(isset($_POST['login'])){
        if ($_POST['email'] == '1045@gmail.com' && $_POST['password'] == '1045'){

            $_SESSION['USER'] = '東横太郎';
            header('Location: top.php');
            exit;
        }
        else{
 
            $message = 'メールアドレスかパスワードが間違っています。';
        }
    }
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>ログイン機能</title>
</head>
 
<body>
<h1>ログイン機能</h1>
<p style="color: red"><?php echo $message ?></p>
<form method="post" action="index.php">
    <label for="email">メールアドレス</label>
    <input id="email" type="email" name="email">
    <br>
    <label for="password">パスワード</label>
    <input id="password" type="password" name="password">
    <br>
    <input type="submit" name="login" value="ログイン">
</form>
 
</body>
</html>