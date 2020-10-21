<?php
    session_start();

    require "../config.php";

    $connection = new PDO($dsn, $username, $password, $options);
    $sql_select = "SELECT * FROM Clothes";
    $statement = $connection->prepare($sql_select);
    $statement->execute();
    $clothesAll = $statement->fetchAll();

    if (isset($_POST['upload'])) {
        if (!empty($_FILES['image']['name'])) {
            try  {
                $imageid = uniqid(mt_rand(), true);
                $email = $_SESSION['Email'];
                $wearType = 'Top';
                $filepath = "./images/$imageid.png";
                $sql = "INSERT INTO Clothes(ImageFile,email,WearType) VALUES (:ImageFile,:email,'$wearType')";
                $stmt = $connection->prepare($sql);
                $stmt->bindValue(':ImageFile', $imageid, PDO::PARAM_STR);
                $stmt->bindValue(':email', $email, PDO::PARAM_STR);
                $stmt->execute();
                move_uploaded_file($_FILES['image']['tmp_name'], $filepath);
                $message = '画像をアップロードしました';
            }
            catch (PDOException $e) {
                echo $e->getMessage();
            }  
        }
    }
?>

<h1>画像アップロード</h1>
<?php if (isset($_POST['upload'])): ?>
    <p><?php echo $message; ?></p>
    <p><a href="image_view.php">画像表示へ</a></p>
<?php else: ?>
    <form method="post" enctype="multipart/form-data">
        <p>アップロード画像</p>
        <input type="file" name="image">
        <button><input type="submit" name="upload" value="送信"></button>

        <p>登録画像一覧</p>
            <table>
      <thead>
        <tr>
         <!-- <th>id</th>-->s
          <th>ImageFile</th>
          <th>email</th>
          <th>WearType</th>
        </tr>
      </thead>
      <tbody>
      <?php
      foreach ((array)$clothesAll as $row) :
       ?>
        <tr>
          <!--<td><?php echo escape($row["id"]); ?></td>-->
          <td><?php echo escape($row["ImageFile"]); ?></td>
          <td><?php echo escape($row["email"]); ?></td>
          <td><?php echo escape($row["WearType"]); ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
</table>
    </form>
<?php endif;?>
<a href="index.php">Back to home</a>
