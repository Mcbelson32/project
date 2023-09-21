<?php
include './server/session.php';
include './server/connect.php';
include 'array.php';
$sql="SELECT * FROM warrior";

$result=mysqli_query($conn, $sql);

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
                    <a href="/">
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
                    <ion-icon name="person-circle-outline"></ion-icon>
                </div>
            </div>


        </div>
    </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script type="module" src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>