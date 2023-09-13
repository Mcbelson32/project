<?php

include './server/fetch.php';
include './server/connect.php';

$sql="SELECT * FROM warrior";

$result=mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warriors</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css?v=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/warrior.css?v=1.0">

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
                        <span class="title">Add Warrior</span>
                    </a>
                </li>


                <li>
                    <a href="relative.php">
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
                    <a href="#">
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
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <!-- <div class="user"> -->
                <!--     <img src="assets/imgs/customer01.jpg" alt=""> -->
                <!-- </div> -->
            </div>

            <!-- ======================= Cards ================== -->

            <div class="cardBox">
                <div class="card" onclick="window.location.href = 'warriors.php'">
                    <div>
                        <div class="numbers"><?php echo $total ?></div>
                        <div class="cardName">warriors</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card" onclick="window.location.href = 'family.php'">
                    <div>
                        <div class="numbers"><?php echo $fam ?></div>
                        <div class="cardName">Families</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $exp ?></div>
                        <div class="cardName">Alive</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="accessibility-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $weekly ?></div>
                        <div class="cardName">Register In a week</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="analytics-outline"></ion-icon>
                    </div>
                </div>
            </div>
            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>All Warriors List</h2>
                    </div>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>FullName</td>
                                    <td>Nationality</td>
                                    <td>Nation</td>
                                    <td>Phone</td>
                                    <td>Lvl of education</td>
                                    <td>Language</td>
                                    <td>Status</td>
                                    <td>Appellation</td>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
if($result){
  $i=0;
  while($row=mysqli_fetch_assoc($result)){
    $id=$row['id'];
    $u_name = $row['u_name'];
    $f_name = $row['f_name'];
    $g_name = $row['g_name'];
    $appellation = $row['appellation'];
    $nationality = $row['nationality'];
    $nation = $row['nation'];
    $phone = $row['phone'];
    $lvl = $row['educ_lvl'];
    $status = $row['warrior_s'];
    $lang = $row['lang'];
    
    echo '
    <tr onclick="window.location.href = \'detail.php?id='.$id.'\'">
        <td>'.$id.'</td>
        <td>'.$u_name.' '.$f_name.' '.$g_name.'</td>
        <td>'.$nationality.'</td>
        <td>'.$nation.'</td>
        <td>'.$phone.'</td>
        <td>'.$lvl.'</td>
        <td>'.$lang.'</td>
        <td>'.$status.'</td>
        <td><span class="status inProgress">'.$appellation.'</span></td>
        <td>
            <a href="form.php?id='.$id.'" class="btn"><ion-icon name="create" ></ion-icon></a>
        </td>
        <td>
            <a href="delete.php?id='.$id.'" class="btn del"><ion-icon name="trash"></ion-icon></a>
        </td>
    </tr>';

    $i++;
  }
  if(!$i){
    echo '<h1 class="empty">No Warriors</h1>
    <script>
    var element = document.getElementById("th");
    window.addEventListener("load", () => {
    while (element.firstChild) {
    element.removeChild(element.firstChild);
  }
    })
    </script>
    ';
  }

  }
?>
                            </tbody>
                        </table>
                    </div>

                    <!-- ================= New Customers ================ -->

                </div>
            </div>
        </div>

        <!-- =========== Scripts =========  -->
        <script src="assets/js/main.js"></script>

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>