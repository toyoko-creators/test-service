<?php
    if (isset($_POST['upload'])) {
        if (!empty($_FILES['image']['name'])) {
            move_uploaded_file($_FILES['image']['tmp_name'], './images/test.png');
            $message = '画像をアップロードしました';
        }
    }
?>

<h1>画像アップロード</h1>
<?php if (isset($_POST['upload'])): ?>
    <p><?php echo $message; ?></p>
    <p><img src="images/test.png" width="300" height="300"></p>
<?php else: ?>
    <form method="post" enctype="multipart/form-data">
        <p>アップロード画像</p>
        <input type="file" name="image">
        <button><input type="submit" name="upload" value="送信"></button>
    </form>
<?php endif;?>