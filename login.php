<?php
include './server/connect.php';
function createRow($conn) {
  $checkRowsQuery = "SELECT COUNT(*) FROM admins";
  $result = $conn->query($checkRowsQuery);
  $rowCount = $result->fetch_row()[0];

  if ($rowCount == 0) {
      // Insert the rows
      $insertQuery = "INSERT INTO admins (username, password, access)
      VALUES
      ('admin', 'admin123', 'full'),
      ('user', 'user123', 'partial')";
      $conn->query($insertQuery);
  }
}
session_start();
unset($_SESSION['message']);

$conn->select_db("admindb");
createRow($conn);
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the user input (you may need to sanitize and validate it)
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
  $res=mysqli_query($conn, $sql);
  // Check if the user exists in the database (you may need to modify this part)
  if($res) {
      if (mysqli_num_rows($res) > 0) {
        // Set a success message in the session
        $_SESSION['message'] = 'success';
        $row = mysqli_fetch_assoc($res);
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['access'] = $row['access'];
        $_SESSION['last_activity'] = time();
        header("refresh:3;url=index.php");
      } else {
        // Set an error message in the session
        $_SESSION['message'] = 'error';
      }
    }
  }

// Display the message if it exists
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/login.css?v=1.0">
    <title>Login</title>
</head>

<body>
    <div class="pop" id="pop">
        <p><?php echo $_GET['msg'] ?> </p>
    </div>
    <form id="form" class="form" method="POST" action="login.php">
        <p id="heading">Login</p>
        <div class="field">
            <ion-icon class="input-icon" name="person"></ion-icon>
            <input autocomplete="off" placeholder="Username" class="input-field" type="text" name="username" required>
        </div>
        <div class="field">
            <ion-icon class="input-icon" name="lock-closed"></ion-icon>
            <input placeholder="Password" name="password" class="input-field" type="password" required>
        </div>
        <button type="submit" class="button2">Login</button>
        <?php if(isset($_SESSION['message'])){ ?>
        <?php if($_SESSION['message'] == "success"): ?>
        <span class="button3 success">Login successful! Redirecting...</span>
        <?php elseif($_SESSION['message'] == 'error'):?>
        <span class="button3 error">Invalid username or password</span>
        <?php endif ?>
        <?php } ?>
    </form>
    <script>
    <?php if (isset($_GET['msg']) && !empty($_GET['msg'])) { ?>
    var pop = document.getElementById('pop');
    pop.classList.add("active");
    setTimeout(() => {
        <?php
       unset($_GET['msg']);
       ?>
    }, 10000);
    <?php } ?>
    <?php if (isset($_GET['status']) && !empty($_GET['status'])) { ?>
    pop.classList.add("success");
    setTimeout(() => {
        <?php
       unset($_GET['status'])
       ?>
    }, 10000);
    <?php } ?>
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>