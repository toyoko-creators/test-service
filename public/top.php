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

    //クローゼット
    if(isset($_POST['closet'])){
    
        $_SESSION = [];
        session_destroy();

        header('Location: index.php');
        exit;
    }
    
    //コーディネート保存
    if(isset($_POST['outfit'])){
    
        $_SESSION = [];
        session_destroy();

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
 
<?php
$pagetitle = 'トップ画面';
include "templates/header.php";
?>

    <form method="post" action="top.php">
        <p><?php echo $_SESSION['USER'] ?> さんでログイン中</p>
        
        <div class="button-normal">
            <input type="submit" class="button" name="closet" value="クローゼット">
        </div>
        <div class="button-normal">
            <input type="submit" class="button" name="outfit" value="コーディネート保存">
        </div>
        <div class="button-normal">
            <input type="submit" class="button" name="logout" value="ログアウト">
        </div>
        <div class="button-normal">
            <input type="submit" class="button" name="tops" value="トップス選択">
        </div>
        <div class="button-normal">
            <input type="submit" class="button" name="bottoms" value="ボトムス選択">
        </div>
    </form>
    <a href="image_upload.php"><strong>Image_upload</strong></a>画像のアップロード
<?php include "templates/footer.php"; ?>