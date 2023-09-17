<?php
include './server/connect.php';
session_start();
unset($_SESSION['message']);

$conn->select_db("admindb");
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the user input (you may need to sanitize and validate it)
  $username = $_POST['username'];
  $password = $_POST['password'];

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
        $_SESSION['type'] = $row['type'];
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
    <form id="form" class="form" method="POST" action="">
        <p id="heading">Login</p>
        <div class="field">
            <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                viewBox="0 0 16 16">
                <path
                    d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z">
                </path>
            </svg>
            <input autocomplete="off" placeholder="Username" class="input-field" type="text" name="username" required>
        </div>
        <div class="field">
            <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                viewBox="0 0 16 16">
                <path
                    d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z">
                </path>
            </svg>
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
</body>

</html>