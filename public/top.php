<?php
    require "../config.php";
    session_start();

    try  {
        $connection = new PDO($dsn, $username, $password, $options);
        $sqltops = "SELECT ImageFile FROM Clothes WHERE email = :email AND WearType = 'Top'" ;
        $stmt = $connection->prepare($sqltops);
        $email = $_SESSION['Email'];
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $tops = $stmt->fetchAll();
        $sqlbottoms = "SELECT ImageFile FROM Clothes WHERE email = :email AND WearType = 'Bottom'" ;
        $stmt = $connection->prepare($sqlbottoms);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $bottoms = $stmt->fetchAll();
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }

    function WearButtonClick($arg_1){
        $_SESSION['WearType'] =$arg_1;
        header("Location: image_upload.php");
        exit;
    }
    //初期化(デフォルトではすべて表示する)
    $_SESSION['WearType'] ='All';

    //ログイン済みかを確認
    if (!isset($_SESSION['USER'])) {
        header('Location: index.php');
        exit;
    }
    
    //コーディネート保存
    if(isset($_POST['outfit'])){
        //exit;
    }

    //ログアウト機能
    if(isset($_POST['logout'])){
        $_SESSION = [];
        session_destroy();
        header('Location: index.php');
        exit;
    }

    //Topsボタンクリック
    if(isset($_POST['TopsButton'])){
        WearButtonClick("Top");
        exit;
    }
    //Bottomsボタンクリック
    if(isset($_POST['BottomsButton'])){
        WearButtonClick("Bottom");
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
                <a href="image_view.php">クローゼット</a><br>
                <a href="#">コーディネート保存</a><br>
                <a href="#">ログアウト</a><br>
            </div>
            <div id="Main_frame_tops">
                <div class="button-normal">
                    <input type="submit" class="button" name="TopsButton" value="トップス選択">
                </div>
            <p width="500" class="imagelist">
                <?php foreach ((array)$tops as $row) : ?>
                    <img src="images/<?php echo $row["ImageFile"]; ?>.png">
                <?php endforeach; ?>
            </p>
            </div>
            <div id="Main_frame_bottoms">
                <div class="button-normal">
                    <input type="submit" class="button" name="BottomsButton"  value="ボトムス選択">
                </div>
            <p width="500" class="imagelist">
                <?php foreach ((array)$bottoms as $row) : ?>
                    <img src="images/<?php echo $row["ImageFile"]; ?>.png">
                <?php endforeach; ?>
            </p>
            </div>
        </div>
    </form>
    <p>
        <a href="image_view.php">一覧表示</a>
<!--
    <form method="post" action="top.php">
        <p><?php echo $_SESSION['USER'] ?> さんでログイン中</p>
        
        <div class="button-normal">
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
