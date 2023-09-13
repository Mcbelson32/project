<?php
include './server/fetch.php';
$conn->select_db("family");
$sql="show tables";

$res=mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family</title>
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
                        <div class="numbers"><?php echo $fam; ?></div>
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


            <!-- ================= New Customers ================ -->
            <div class="recentCustomers">
                <div class="cardHeader">
                    <h2>Recent Families</h2>
                </div>

                <table>
                    <?php
if ($res) {
  $n = 0;
    while ($tables = mysqli_fetch_array($res)) {
      $table = $tables[0];
      $conn->select_db("family");
      $sql = "SELECT * FROM $table";
      $ans = mysqli_query($conn, $sql);
      $mem = mysqli_num_rows($ans);
      if(!$mem){
        continue;
      }
        echo "<thead>
                <tr>
                    <td>
                        <h4>$table<br> <span>$mem members</span></h4>
                    </td>
    </tr>
            </thead>";
echo "<tr id=\"name\"><td>
          <h4>ID</h4>
          <h4>FullName</h4>
          <h4>Family type</h4>
        <h4>B.Date</h4>
        <h4>Status</h4>
        <h4>Duration</h4>
        <h4>Education lvl</h4>
        </td></tr>";

        echo '';
        if ($ans) {
            $row = mysqli_fetch_assoc($ans); // Fetch the first row
            
        while ($row) {
             
            $id=$row['id'];
            $uname = $row['uname'];
            $type = $row['member'];
            $lvl = $row['educ_lvl'];
            $b_date = $row['b_date'];
            $status = $row['status'];
            $duration = $row['duration'];

        $onclick="onclick=\"window.location.href ='detail.php?id=";
                        echo "<tbody>
                        <tr $onclick.$id'\">
        <td>
        <h4>$id</h4>
        <h4>$uname</h4>
        <h4>$type</h4>
        <h4>$b_date</h4>
        <h4>$status</h4>
        <h4>$duration</h4>
        <h4 id=\"lvl\">$lvl</h4>
                   </td>
                        </tr>
                    </tbody>";
                
                $row = mysqli_fetch_assoc($ans); // Fetch the next row
            }
        }
        
        $n++;
    }
    
    if (!$n) {
        echo '<h1 class="empty">No Families</h1>';
    }
}
?>
                </table>
            </div>
        </div>
    </div>
    </div>
    <style>
    .recentCustomers table,
    .recentCustomers table tr,
    .recentCustomers table tr td {
        width: 95%;
    }

    .recentCustomers table tbody tr td {
        width: 100%;
        border: 2px #cacad850 solid;
        padding-left: 50px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .recentCustomers table tbody tr td h4 {
        color: black;
        /* max-width: 100px; */
        /* overflow: scroll; */
    }

    .recentCustomers table tbody tr td #lvl {
        max-width: 20%;
        word-break: break-all;
    }

    .recentCustomers table tbody tr td:hover {
        background: #2a218555;
    }

    .recentCustomers table tbody tr:hover td h4 {
        /* color: var(--white); */
    }

    .cardHeader {
        margin-bottom: 15px;
    }

    .cardHeader h2::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 1%;
        width: 18%;
        height: 3px;
        background-color: var(--blue);
    }

    .recentCustomers table tr td h4 {
        color: var(--white);
    }

    .recentCustomers table #name td {
        background-color: #2a2185bb;
        border-radius: 20px;
    }

    #name * {
        border-radius: 20px;
    }

    #name td h4 {

        color: var(--white);
    }
    </style>
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>