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
        <div id="container">
            <div id="Menu_frame">
				<p><?php echo $_SESSION['USER'] ?> さんでログイン中</p>
                <a href="#">クローゼット</a><br>
                <a href="#">コーディネート保存</a><br>
                <a href="#">ログアウト</a><br>
				<!-- <a href="image_upload.php"><strong>Image_upload</strong></a>画像のアップロード<br> -->
            </div>
            <div id="Main_frame_tops">
                <button type="button" onclick="location.href='image_upload.php'">トップス選択</button>
            </div>
            <div id="Main_frame_bottoms">
                <button type="button" onclick="location.href='image_upload.php'">ボトムス選択</button>
            </div>
	    </div>
    </form>
    
<?php include "templates/footer.php"; ?>