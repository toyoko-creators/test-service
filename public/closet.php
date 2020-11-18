<?php
    session_start();
    $results = "";
    $ListNo=1;
    //ログイン済みかを確認
    if (!isset($_SESSION['USER'])) {
        header('Location: index.php');
        exit;
    }

    require "../config.php";
    try  {
        $connection = new PDO($dsn, $username, $password, $options);
        $sql = "SELECT TopFile,BottomFile FROM FavoList WHERE email = :email" ;
        $stmt = $connection->prepare($sql);
        $email = $_SESSION['Email'];
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll();
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }   
    
?>
<?php
$pagetitle = 'クローゼット';
include "templates/header.php";
?>
<h1>クローゼット</h1>

<?php if (empty($results)): ?>
    <p>1つもお気に入り登録されていません</p>
<?php else: ?>
    <table>
        <tr>
        <th>No</th>
        <?php foreach ((array)$results as $row) 
            {Echo "<th>".$ListNo."</th>";  $ListNo=$ListNo+1;}
        ?>
        </tr>
        <tr>
        <Td><b>Top</b></Td>
        <?php foreach ((array)$results as $row) 
            {Echo "<td><img src=\"images/".$row["TopFile"].".png\" width=\"300\" height=\"300\"></td>";}
        ?>
        </tr>
        <tr>
        <Td><b>Bottom</b></Td>
        <?php foreach ((array)$results as $row) 
        {Echo "<td><img src=\"images/".$row["BottomFile"].".png\" width=\"300\" height=\"300\"></td>";}
        ?>
        </tr>
    </table>
<?php endif;?>
<a href="index.php">Back to Top</a>
<?php include "templates/footer.php"; ?>


