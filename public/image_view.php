<?php
    session_start();

    require "../config.php";

    try  {
        $connection = new PDO($dsn, $username, $password, $options);
        //$sql = "SELECT * FROM Clothes WHERE WearType = 'Top'";
        $sql = "SELECT WearType,ImageFile FROM Clothes WHERE email = :email AND WearType = '".$_GET['WearType']."'" ;
        $stmt = $connection->prepare($sql);
        $email = $_SESSION['Email'];
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll();
        $message = '画像を読み込みました';
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }  
?>
 
<?php
$pagetitle = '画像一覧：'.$_GET['WearType'];
include "templates/header.php";
?>

<h1>画像表示：<?php echo $_GET['WearType']?></h1>
<p><?php echo $message; ?></p>
<?php if (isset($results)): ?>
    <table>
      <thead>
        <tr>
          <th>WearType</th>
          <th>imageid</th>
          <th>image</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ((array)$results as $row) : ?>
        <tr>
          <td><?php echo $row["WearType"]; ?></td>
          <td><?php echo $row["ImageFile"]; ?></td>
          <td><img src="images/<?php echo $row["ImageFile"]; ?>.png" width="300" height="300"></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
<?php endif;?>
<p><a href="image_upload.php">画像アップロードへ</a></p>
<a href="index.php">Back to home</a>
<?php include "templates/footer.php"; ?>
