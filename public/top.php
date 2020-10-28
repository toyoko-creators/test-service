<?php
    require "../config.php";
    session_start();

    //ログイン済みかを確認
    if (!isset($_SESSION['USER'])) {
        header('Location: index.php');
        exit;
    }

    

    //クローゼット
    if(isset($_POST['closet'])){
    

        header('Location: index.php');
        exit;
    }
    
    //コーディネート保存
    if(isset($_POST['outfit'])){
    

        exit;
    }

    //ログアウト機能
    if(isset($_POST['logout'])){
    
        $_SESSION = [];
        session_destroy();

        header('Location: index.php');
        exit;
    }

    //ログアウト機能
    if(isset($_POST['logout'])){
    
       // $_SESSION = [];
       // session_destroy();

       // header('Location: index.php');
        exit;
    }

?>
 
<?php
$pagetitle = 'トップ画面';
include "templates/header.php";
?>

    <form method="post" name="TopForm" action="top.php">
        <div id="container">
            <div id="Menu_frame">
				<p><?php echo $_SESSION['USER'] ?> さんでログイン中</p>
                <a href="image_view.php" name="closet">クローゼット</a><br>
                <input type="hidden" name="SaveData" valuse="SaveData"><a href="javascript:TopForm.submit()" name="outfit">コーディネート保存</a><br>
                <input type="hidden" name="logout" valuse="logout"><a href="javascript:TopForm.submit()" name="logout">ログアウト</a><br>
            </div>
            <div id="Main_frame_tops">
                <button type="button" onclick="location.href='image_upload.php?WearType=Top'">トップス選択</button>
            </div>
            <div id="Main_frame_bottoms">
                <button type="button" onclick="location.href='image_upload.php?WearType=Bottom'">ボトムス選択</button>
            </div>
	    </div>
    </form>
    <p>
        <a href="image_view.php?WearType=Top">一覧表示(Top)</a><br>
        <a href="image_view.php?WearType=Bottom">一覧表示(Bottom)</a>
    </p>
<!--
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
-->
<?php include "templates/footer.php"; ?>
