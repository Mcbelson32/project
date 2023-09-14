<?php

include './server/connect.php';
include 'array.php';
$sql="SELECT * FROM warrior";

$result=mysqli_query($conn, $sql);
header('location: /');
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
                            <ion-icon name="person-add"></ion-icon>
                        </span>
                        <span class="title">Add warrior</span>
                    </a>
                </li>


                <li>
                    <a href="form.php">
                        <span class="icon">
                            <ion-icon name="person-add"></ion-icon>
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

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">1,504</div>
                        <div class="cardName">Total</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">Families</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">Experienced</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="accessibility-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">382</div>
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
                        <h2>Recent persons</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead id="th">
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
if($result){
  $i=1;
  while(($row=mysqli_fetch_assoc($result)) && $i<=10){
    $id=$row['id'];
    $u_name = $row['u_name'];
    $f_name = $row['f_name'];
    $appellation = $row['appellation'];
    $nationality = $row['nationality'];
    $nation = $row['nation'];
    
    echo '<tr>
      <td>'.$id.'</td>
      <td>'.$u_name.' '.$f_name.'</td>
      <td>'.$nationality.'</td>
      <td>'.$nation.'</td>
      <td><span class="status delivered">'.$appellation.'</span></td>
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

                            <!-- <tr> -->
                            <!--     <td>Dagim Belachew</td> -->
                            <!--     <td>19</td> -->
                            <!--     <td>Belachew Abera</td> -->
                            <!--     <td><span class="status inProgress">Basic</span></td> -->
                            <!-- </tr> -->

                            <!-- <tr> -->
                            <!--     <td>Girum Minase</td> -->
                            <!--     <td>30</td> -->
                            <!--     <td>Minase Balcha</td> -->
                            <!--     <td><span class="status pending">Beginner</span></td> -->
                            <!-- </tr> -->

                            <!-- <tr> -->
                            <!--     <td>Adane Biruk</td> -->
                            <!--     <td>27</td> -->
                            <!--     <td>Biruk Alemayew</td> -->
                            <!--     <td><span class="status inProgress">Basic</span></td> -->
                            <!-- </tr> -->

                            <!-- <tr> -->
                            <!--     <td>Samuel Abel</td> -->
                            <!--     <td>22</td> -->
                            <!--     <td>Abel Sol</td> -->
                            <!--     <td><span class="status delivered">Experienced</span></td> -->
                            <!-- </tr> -->

                            <!-- <tr> -->
                            <!--     <td>Bethelihem Abera</td> -->
                            <!--     <td>29</td> -->
                            <!--     <td>Abera Sisay</td> -->
                            <!--     <td><span class="status pending">Beginner</span></td> -->
                            <!-- </tr> -->

                            <!-- <tr> -->
                            <!--     <td>Azeb Siyum</td> -->
                            <!--     <td>25</td> -->
                            <!--     <td>Siyum Belachew</td> -->
                            <!--     <td><span class="status inProgress">Basic</span></td> -->
                            <!-- </tr> -->

                            <!-- <tr> -->
                            <!--     <td>Mikyas kaleb</td> -->
                            <!--     <td>23</td> -->
                            <!--     <td>Kaleb Bisrat</td> -->
                            <!--     <td><span class="status inProgress">Besic</span></td> -->
                            <!-- </tr> -->
                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Families</h2>
                    </div>

                    <table>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Dawit Alemseged<br> <span>7 members</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Nathan Daniel<br> <span>3 members</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Dagim Yonas<br> <span>4 members</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Abera Sisay<br> <span>2 members</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Siyum Belachew<br> <span>26 members</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Biruk Alemayew<br> <span>11 members</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>kaleb Bisrat<br> <span>5 members</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Adonias Abebe<br> <span>6 members</span></h4>
                            </td>
                        </tr>
                    </table>
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