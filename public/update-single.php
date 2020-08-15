<?php

/**
  * Use an HTML form to edit an entry in the
  * users table.
  *
  */

require "./config.php";
require "./common.php";


if (isset($_POST['submit'])) {
 
    try {
      $connection = new PDO($dsn, $username, $password);
      $user =[
        "id"        => $_POST['id'],
        "name" => $_POST['name'],
        "class"  => $_POST['class'],
        "mark"     => $_POST['mark'],
        "location"  => $_POST['location']
      ];
  
      $sql = "UPDATE student
              SET id = :id,
                name = :name,
                class = :class,
                mark = :mark,
                location = :location,
              WHERE id = :id";
  
    $statement = $connection->prepare($sql);
    $statement->execute($user);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
  }
  

if (isset($_GET['id'])) {
    try {
      $connection = new PDO($dsn, $username, $password);
      $id = $_GET['id'];
      
      $sql = "SELECT * FROM student WHERE id = :id";
      //
      echo "id=" . $id;
      
      $statement = $connection->prepare($sql);
      $statement->bindValue(':id', $id);
      $statement->execute();
  
      $user = $statement->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
  } else {
    echo "Something went wrong!";
    exit;
  }
?>


<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
  <?php echo escape($_POST['name']); ?> successfully updated.
<?php endif; ?>


<h2>Edit a user</h2>

<form method="post">

    <?php foreach ($user as $key => $value) : ?>
    <?php echo ($key); echo "value:" . $value;?>
      <label for="<?php echo"update-single"; echo $key; ?>"><?php echo ucfirst($key); ?></label>
      <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
    <?php endforeach; ?>
    <input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>
<?php require "templates/footer.php"; ?>