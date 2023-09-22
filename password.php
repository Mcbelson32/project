<?php
include './server/session.php';
include './server/connect.php';
include 'array.php';

$conn->select_db("admindb");

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($_POST['type'] == 'username'){
        $username = $_POST['username'];
        $oldname = $_POST['oldname'];
        $pass = md5($_POST['password']);

        $sql = "UPDATE admins SET username = '$username' WHERE username = '$oldname' AND password = '$pass'";
        $res = mysqli_query($conn, $sql);
        if($res) {
            header('location: logout.php');
            exit();
        }else{
            die(mysqli_error($conn));
          }
    }elseif($_POST['type'] == 'password'){
        $username = $_POST['username'];
        $oldpass = md5($_POST['o_pass']);
        $pass = md5($_POST['password']);

        $sql = "UPDATE admins SET password = '$pass' WHERE username = '$username' AND password = '$oldpass'";
        $res = mysqli_query($conn, $sql);
        if($res) {
            header('location: logout.php');
            exit();
        }else{
            die(mysqli_error($conn));
          }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css?v=1.0">
    <link rel="stylesheet" type="text/css" href="./assets/css/form.css?v=1.0">

</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="logo-buffer"></ion-icon>
                        </span>
                        <span class="title big">Name</span>
                    </a>
                </li>

                <li>
                    <a href="index.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="family.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Families</span>
                    </a>
                </li>

                <li>
                    <a href="warriors.php">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="title">warriors</span>
                    </a>
                </li>

                <li>
                    <a href="form.php">
                        <span class="icon">
                            <ion-icon name="person-add-outline"></ion-icon>
                        </span>
                        <span class="title">Add warrior</span>
                    </a>
                </li>


                <li>
                    <a href="form.php">
                        <span class="icon">
                            <ion-icon name="person-add-outline"></ion-icon>
                        </span>
                        <span class="title">Add Relative</span>
                    </a>
                </li>


                <li>
                    <a href="password.php">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="title">Password</span>
                    </a>
                </li>

                <li>
                    <a href="logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" name="search" id="search" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                    <div class="search-table">
                        <div class="table-container">

                            <table>
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>User Name</td>
                                        <td>Father's name</td>
                                        <td>Granfather's name</td>
                                    </tr>
                                </thead>

                                <tbody id="tbody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="user">
                    <ion-icon name="person-circle-outline" onclick="activator()"></ion-icon>
                    <div class="profile" id="profile">
                        <ion-icon name="person-circle-outline"></ion-icon>
                        <hr>
                        <div class="profile-info">
                            <span class="profile-label">Username:</span>
                            <span class="profile-value"><?php echo $_SESSION['username']?></span>
                        </div>
                        <div class="profile-info">
                            <span class="profile-label">Access:</span>
                            <span class="profile-value"><?php echo $_SESSION['access']?></span>
                        </div>
                        <div class="profile-info">
                            <span class="profile-label">Last login:</span>
                            <span
                                class="profile-value"><?php echo date('Y-m-d_H:i:s', $_SESSION['last_activity']);?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="details">
                <div class="container">
                    <div class="title">Change username</div>
                    <div class="content">
                        <form action="" class="form name" id="nameform" method="POST">
                            <input type="hidden" name="type" value="username">
                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details">Old Username</span>
                                    <input type="text" name="oldname" id="oldname" placeholder="Enter your old username"
                                        required value="<?php echo $_SESSION['username'] ?>">
                                </div>
                                <div class="input-box">
                                    <span class="details">New Username</span>
                                    <input type="text" name="username" id="newname"
                                        placeholder="Enter your new username" required value="">
                                </div>

                                <div class="input-box">
                                    <sp class="details">Password</span>
                                        <input type="password" name="password" id="password"
                                            placeholder="Enter your password" required value="">
                                </div>
                            </div>
                            <p id="name-error" class="error-message"></p>
                            <div class="button">
                                <input type="submit" value="Save" onclick="nameChecker()">
                            </div>
                        </form>
                    </div>
                    <div class="title">Change password</div>
                    <div class="content">
                        <form action="" class="form pass" id="passform" method="POST">
                            <input type="hidden" name="type" value="password">
                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details">UserName</span>
                                    <input type="text" name="username" id="username" placeholder="Enter your username"
                                        required value="<?php echo $_SESSION['username'] ?>">
                                </div>
                                <div class="input-box">
                                    <span class="details">Old Password</span>
                                    <input type="password" name="o_pass" id="o_pass"
                                        placeholder="Enter your old password" required value="">
                                </div>

                                <div class="input-box">
                                    <span class="details">New Password</span>
                                    <input type="password" name="password" id="pass"
                                        placeholder="Enter your new password" required value="">
                                </div>
                                <div class="input-box">
                                    <span class="details">Confirm Password</span>
                                    <input type="password" placeholder="confirm your new password" name="c_pass"
                                        id="c_pass" required value="">
                                </div>
                            </div>
                            <p id="pass-error" class="error-message"></p>
                            <div class="button">
                                <input type="submit" value="Save" onclick="passChecker()">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    <script>
    var p_form = document.getElementById('passform');
    var n_form = document.getElementById('nameform');
    var newPass = document.getElementById('pass');
    var conf = document.getElementById('c_pass');
    var old = document.getElementById('oldname');
    var newUsername = document.getElementById('username');
    var passError = document.getElementById('pass-error');
    var nameError = document.getElementById('name-error');

    function passChecker(e) {
        e.preventDefault(); // Prevent form submission and page reload
        if (newPass.value === conf.value) {
            p_form.submit();
        } else {
            newPass.value = "";
            conf.value = "";
            passError.style.display = "block";
            passError.textContent = "Passwords do not match. Please try again.";
        }
    }

    function nameChecker(e) {
        e.preventDefault(); // Prevent form submission and page reload
        if (newUsername.value != old.value) {
            n_form.submit();
        } else {
            newUsername.value = "";
            old.value = "";
            nameError.style.display = "block";
            nameError.textContent = "Incorrect username. Please try again.";
        }
    }

    // Add event listeners for form submissions
    p_form.addEventListener('submit', passChecker);
    n_form.addEventListener('submit', nameChecker);

    function activator() {
        var profile = document.querySelector('.profile');
        profile.classList.toggle('active');
    }
    </script>
    <style>
    .error-message {
        display: none;
        width: 70%;
        border-radius: 10px;
        padding: 5px 0;
        background: #f21b3f;
        color: white;
        text-align: center;
        margin-left: 15%;
        transition: all 1s ease-in-out;
    }

    .content form .user-details {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        gap: calc((100% / 2 - 20px) / 2);
        /* justify-content: space-between; */
        margin: 20px 0 12px 0;
    }

    form .user-details .input-box {
        margin-bottom: 15px;
        width: calc(100% / 3 - 20px);
    }

    .details .container .title::before {
        left: 25px;
        bottom: -5px;
        height: 3px;
        width: 170px;
        border-radius: 5px;
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }
    </style>
    <!-- =========== Scripts =========  -->
    <script type="module" src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>