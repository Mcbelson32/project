<?php
include './server/fetch.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relative Form</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/form.css">
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
                <div class="container">
                    <div class="title">Registration</div>
                    <div class="content">
                        <form action="./server/group.php" id="form" method="POST">
                            <?php if(isset($_GET['id'])): ?>
                            <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
                            <?php endif ?>
                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details">Family ID(Father's ID)</span>
                                    <input type="text" name="u_id" id="u_id" placeholder="Enter your ID" required
                                        value="<?php if(isset($_GET['id'])){echo $u_id;}?>">
                                </div>

                                <div class="input-box">
                                    <span class="details">Full Name</span>
                                    <input type="text" name="u_name" id="u_name" placeholder="Enter your name" required
                                        value="<?php if(isset($_GET['id'])){echo $u_name;}?>">
                                </div>

                                <div class="input-box">
                                    <span class="details">relativity</span>
                                    <select name="type" id="type" onchange="selectFam()">
                                        <option value="Wife">Wife</option>
                                        <option value="Child">Child</option>
                                        <option value="Representativ">Grandchild</option>
                                        <option value="Representativ">Representative</option>
                                    </select>
                                </div>

                                <div class="input-box">
                                    <span class="details">Status</span>

                                    <select name="educ_lvl" id="educ_lvl">
                                        <option value="Alive">Alive</option>
                                        <option value="Dead">Dead</option>
                                        <option value="Divorced">Divorced</option>
                                    </select>
                                </div>

                                <div class="input-box">
                                    <span class="details">Birth Date</span>
                                    <input type="date" name="b_date" id="b_date" required
                                        value="<?if(isset($_GET['id'])){echo $b_date;}?>">
                                </div>

                                <div class="input-box">
                                    <span class="details">level of education</span>

                                    <select name="educ_lvl" id="educ_lvl">
                                        <option value="primary">Primary School</option>
                                        <option value="secondary">Secondary School</option>
                                        <option value="preparatory">Preparatory School</option>
                                        <option value="vocational">Vocational School</option>
                                        <option value="college">College</option>
                                        <option value="bachelor">Bachelor's Degree</option>
                                        <option value="master">Master's Degree</option>
                                        <option value="phd">PhD</option>
                                        <option value="doctorate">Doctorate Degree</option>
                                        <option value="professor">Professor</option>
                                        <option value="uneducateed">Uneducated</option>
                                    </select>
                                </div>
                            </div>

                            <span class="details">Duration</span>
                            <div class="input-box dur">
                                <input type="date" name="b_date" id="b_date" required
                                    value="<?if(isset($_GET['id'])){echo $b_date;}?>">
                                -
                                <input type="date" name="b_date" id="b_date" required
                                    value="<?if(isset($_GET['id'])){echo $b_date;}?>">
                            </div>
                            <div class="button">
                                <?php if (isset($_GET['id'])) { ?>
                                <input type="submit" value="update">
                                <?php }else{ ?>
                                <input type="submit" value="Register">
                                <?php } ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- =========== Scripts =========  -->
        <script src="assets/js/main.js"></script>

        <script>
        var lvl = document.getElementById('educ_lvl');
        lvl.value = '<?php if(isset($_GET['id'])){echo $educ_lvl;}else{echo "";}?>';
        </script>
        <!-- <script> -->
        <!-- var form = document.getElementById('form'); -->

        <!-- form.addEventListener('submit', (e) => { -->
        <!--   e.preventDefault(); -->
        <!-- }); -->
        <!-- </script> -->
        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>