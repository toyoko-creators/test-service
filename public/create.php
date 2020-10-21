<?php

/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */
    session_start();

require "../config.php";
require "../common.php";

if (isset($_POST['submit'])) {
  try  {
    $connection = new PDO($dsn, $username, $password, $options);
    
    $new_user = array(
      "email"     => $_POST['email'],
      "lastname"  => $_POST['lastname'],
      "firstname" => $_POST['firstname'],
      "VerifyPassword"  => password_hash($_POST['Password'], PASSWORD_DEFAULT)
    );

    $sql = sprintf(
      "INSERT INTO %s (%s) values (%s)",
      "users",
      implode(", ", array_keys($new_user)),
      ":" . implode(", :", array_keys($new_user))
    );
    
    $statement = $connection->prepare($sql);
    $statement->execute($new_user);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}
?>
<?php require "templates/header.php"; ?>
  <?php if (isset($_POST['submit']) && $statement) : ?>
    <blockquote><?php echo escape($_POST['email']); ?> successfully added.</blockquote>
  <?php endif; ?>

  <h2>Add a user</h2>

  <form method="post">
    <label for="email">Email Address</label>
    <input type="text" name="email" id="email">
    <label for="firstname">First Name</label>
    <input type="text" name="firstname" id="firstname">
    <label for="lastname">Last Name</label>
    <input type="text" name="lastname" id="lastname">
    <label for="Password">Password</label>
    <input type="text" name="Password" id="Password">
    <input type="submit" name="submit" value="Submit">
  </form>

  <a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>
