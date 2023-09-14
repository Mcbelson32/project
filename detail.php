<?php
include './server/fetch.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css?v=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/detail.css?v=1.0">
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
                        <span class="title">Add Warrior</span>
                    </a>
                </li>


                <li>
                    <a href="relative.php">
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
                </div>

                <!-- <div class="user"> -->
                <!--     <img src="assets/imgs/customer01.jpg" alt=""> -->
                <!-- </div> -->
            </div>

            <!-- ======================= Cards ================== -->


            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="container">
                    <div class="title">Details</div>
                    <div class="content">
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">ID</span>
                                <p class="input">
                                    <?php echo $id ?>
                                </p>
                            </div>

                            <div class="input-box">
                                <span class="details">User Name</span>
                                <p class="input">
                                    <?php echo $u_name ?>
                                </p>
                            </div>
                            <div class="input-box">
                                <span class="details">Father's Name</span>
                                <p class="input"><?php echo $f_name ?></p>
                            </div>
                            <div class="input-box">
                                <span class="details">GrandFather's Name</span>
                                <p class="input"><?php echo $g_name ?></p>
                            </div>

                            <div class="input-box">
                                <span class="details">Mother's FullName</span>
                                <p class="input">
                                    <?php echo $m_name ?>
                                </p>
                            </div>
                            <div class="input-box">
                                <span class="details">Appellation</span>
                                <p class="input">
                                    <?php echo $appellation ?>
                                </p>
                            </div>

                            <div class="input-box">
                                <span class="details">Birth Date</span>
                                <p class="input">
                                    <?php echo $b_date ?>
                                </p>
                            </div>
                            <div class="input-box">
                                <span class="details">Birth Place</span>
                                <p class="input">
                                    <?php echo $b_place ?>
                                </p>

                            </div>
                            <div class="input-box">
                                <span class="details">Nationality</span>
                                <p class="input">
                                    <?php echo $nationality ?>
                                </p>
                            </div>
                            <div class="input-box">
                                <span class="details">Nation</span>
                                <p class="input">
                                    <?php echo $nation ?>
                                </p>
                            </div>
                            <div class="input-box">
                                <span class="details">Blood Type</span>
                                <p class="input">
                                    <?php echo $bloodtype ?>
                                </p>
                            </div>
                            <div class="input-box">
                                <span class="details">Region</span>
                                <p class="input">
                                    <?php echo $region ?>
                                </p>
                            </div>
                            <div class="input-box">
                                <span class="details">Warada</span>
                                <p class="input">
                                    <?php echo $warada ?>
                                </p>
                            </div>

                            <div class="input-box">
                                <span class="details">kebele</span>
                                <p class="input">
                                    <?php echo $kebele ?>
                                </p>
                            </div>

                            <div class="input-box">
                                <span class="details">H.number</span>
                                <p class="input">
                                    <?php echo $h_number ?>
                                </p>
                            </div>


                            <div class="input-box">
                                <span class="details">Phone Number</span>
                                <p class="input">
                                    <?php echo $phone ?>
                                </p>
                            </div>
                            <div class="input-box">
                                <span class="details">P.O Box</span>
                                <p class="input">
                                    <?php echo $po_box ?>
                                </p>
                            </div>
                            <div class="input-box">
                                <span class="details">Language Skill</span>
                                <p class="input">
                                    <?php echo $language ?>
                                </p>
                            </div>

                            <div class="input-box">
                                <span class="details">Level of education</span>
                                <p class="input">
                                    <?php echo $educ_lvl ?>
                                </p>
                            </div>

                            <div class="input-box">
                                <span class="details">And types</span>
                                <p class="input">
                                    <?php echo $educ_type ?>
                                </p>
                            </div>
                            <div class="input-box">
                                <span class="details">Warrior's class & year</span>
                                <p class="input">
                                    <?php echo $class ?>
                                </p>
                            </div>
                            <div class="input-box">
                                <span class="details">work</span>
                                <p class="input">
                                    <?php echo $work ?>
                                </p>
                            </div>

                        </div>
                        <span class="gender-title">if wounded at the battlefield </span> <br>
                        <div class="category">
                            <label for="wound-1">
                                <div class="radio">
                                    <div class=<?php if($iswounded=='wounded' ){echo '"checked"';} ?>></div>
                                </div>

                                <span class="gender">&nbsp; wounded </span>
                            </label>
                            <label for="wound-2">
                                <div class="radio">
                                    <div class=<?php if($iswounded=='not wounded' ){echo '"checked"';} ?>></div>
                                </div>

                                <span class="gender">&nbsp; not wounded</span>
                            </label>
                        </div>


                        <span class="gender-title">The warrior</span> <br>
                        <div class="category">
                            <label for="war-1">
                                <div class="radio">
                                    <div class=<?php if($warrior_s=='Alive' ){echo '"checked"';} ?>></div>
                                </div>

                                <span class="gender">&nbsp;Alive</span>
                            </label>
                            <label for="war-2">
                                <div class="radio">
                                    <div class=<?php if($warrior_s=='Dead' ){echo '"checked"';} ?>></div>
                                </div>
                                <span class="gender">&nbsp;Dead</span>
                            </label>
                        </div>
                        <div class="input-box">
                            <span class="details">Work Experience</span>
                            <p class="textarea">
                                <?php echo $experience; ?>
                            </p>
                        </div>


                        <div class="button">
                            <a href=<?php echo"form.php?id=$id";?> class="btn">
                                <ion-icon name="create"></ion-icon> edit
                            </a>
                            <a href=<?php echo"delete.php?id=$id";?> class="btn">
                                <ion-icon name="trash"></ion-icon>
                                delete
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- =========== Scripts =========  -->
        <script src="assets/js/main.js"></script>

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