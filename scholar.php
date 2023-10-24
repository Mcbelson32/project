<?php
include './server/session.php';
include './server/fetch.php';
include 'array.php';
$conn->select_db("family");
$sql="SHOW TABLES";

$tables=mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css?v=1.0">

</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="index.php">

                        <img id="logo" src="assets/img/logo.png" alt="The Ethiopian Korea war Veterans Association">

                        <span class="big">The Ethiopian Korea war <br> Veterans Association</span>
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
                        <span class="title">Veterans</span>
                    </a>
                </li>

                <li>
                    <a href="form.php">
                        <span class="icon">
                            <ion-icon name="person-add-outline"></ion-icon>
                        </span>
                        <span class="title">Add Veteran</span>
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
                                        <td>Grandfather's name</td>
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

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card" onclick="window.location.href = 'warriors.php'">
                    <div>
                        <div class="numbers"><?php echo $total ?></div>
                        <div class="cardName">Total</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card" onclick="window.location.href = 'family.php'">
                    <div>
                        <div class="numbers"><?php echo $fam ?></div>
                        <div class="cardName">Pending</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $exp ?></div>
                        <div class="cardName">Accepted</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="accessibility-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $weekly ?></div>
                        <div class="cardName">Rejected</div>
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
                        <h2>Recent Apply</h2>
                        <a href="warriors.php" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>FullName</td>
                                <td>Nationality</td>
                                <td>Nation</td>
                                <td>Appellation</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
if($all){
  $i=0;
  $row=mysqli_fetch_assoc($all);
  while($row && $i<12){
    $id=$row['id'];
    $u_name = $row['u_name'];
    $f_name = $row['f_name'];
    $g_name = $row['g_name'];
    $appellation = $row['appellation'];
    $nationality = $row['nationality'];
    $nation = $row['nation'];
    
    echo '<tr onclick="window.location.href = \'detail.php?id='.$id.'&type=war\'">
      <td>'.$id.'</td>
      <td>'.$u_name.' '.$f_name.' '.$g_name.'</td>
      <td>'.$nationality.'</td>
      <td>'.$nation.'</td>
      <td><span class="status delivered">'.$appellation.'</span></td>
      </tr>';
    $i++;
    $row=mysqli_fetch_assoc($all);
  }
  if(!$i){
    echo '<h1 class="empty">No Veterans</h1>
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
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Accepted</h2>
                    </div>

                    <table>

                        <?php
if($tables){
  $i=0;
  while($row=mysqli_fetch_array($tables)){
    $name = $row[0];
    $search = "SELECT * FROM `$name`";
    $ans = mysqli_query($conn, $search);
    if ($ans) {
        $mem = mysqli_num_rows($ans);
        $id=mysqli_fetch_array($ans);
    } else {
        die('Query Error: ' . mysqli_error($conn));
    }
    if(!$mem){
        continue;
      }
                            echo '<tr onclick="window.location.href = \'family.php#'.$id[0][0].'\'">
                              <td>
                                <h4>'.$name.'<br> <span>'.$mem.' members</span></h4>
                            </td>
    </tr>';
    $i++;
  }
  if(!$i){
    echo '<h1 class="empty">No Families</h1>';
  }
}
?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
    function activator() {
        var profile = document.querySelector(".profile");
        profile.classList.toggle("active");
    }
    </script>
    <!-- =========== Scripts =========  -->
    <script type="module" src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>