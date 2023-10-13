<?php
include './server/session.php';
include './server/fetch.php';
include 'array.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
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

            <!-- ======================= Cards ================== -->


            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="container">
                    <div class="title">Details</div>
                    <div class="content">
                        <?php if ($_GET['type'] == 'war') { ?>
                        <div class="print war">
                            <div class="user-details">

                                <div class="input-box wrap">
                                    <span class="details">Veteran's ID</span>
                                    <p class="input">
                                        <?php echo $id ?>
                                    </p>
                                </div>
                                <div class="input-box wrap">
                                    <span class="details">VRegister ID</span>
                                    <p class="input">
                                        <?php echo $reg_id ?>
                                    </p>
                                </div>

                                <div class="input-box wrap">
                                    <span class="details">User Name</span>
                                    <p class="input">
                                        <?php echo $u_name ?>
                                    </p>
                                </div>
                                <?php
                                if(!empty(trim($img)) && $img != "N/A"){
                                    ?>
                                <div class="input-box img">
                                    <img src="image/<?php echo $img ?>" alt="">
                                </div>
                                <style>
                                .wrap {
                                    margin-top: 70px;
                                }

                                @media print {
                                    .print .user-details .input-box.wrap {
                                        margin-bottom: 15px;
                                        width: calc(100% / 4 - 20px);
                                    }
                                }
                                </style>
                                <?php } ?>

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
                                    <span class="details">Kebele</span>
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
                                    <span class="details">Language</span>
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
                                    <span class="details">Education types</span>
                                    <p class="input">
                                        <?php echo $educ_type ?>
                                    </p>
                                </div>
                                <div class="input-box">
                                    <span class="details">Warrior's class</span>
                                    <p class="input">
                                        <?php echo $class ?>
                                    </p>
                                </div>
                                <div class="input-box">
                                    <span class="details">class year</span>
                                    <p class="input">
                                        <?php echo $c_year ?>
                                    </p>
                                </div>
                                <div class="input-box">
                                    <span class="details">work</span>
                                    <p class="input">
                                        <?php echo $work ?>
                                    </p>
                                </div>

                            </div>

                            <div class="input-box">
                                <span class="details">Award and Presenter</span>
                                <div class="wrapper <?php echo ($award_amount) ? "not" : '' ?> wrapper_1">
                                    <?php if($award_amount) { ?>
                                    <span class="details">award</span>
                                    <span class="details">presenter</span>
                                    <span class="details">year</span>
                                    <?php for($i = 0; $i < $award_amount; $i++) { ?>

                                    <p class="input">
                                        <?php echo $awards[$i]; ?>
                                    </p>
                                    <p class="input">
                                        <?php echo $presenters[$i]; ?>
                                    </p>
                                    <p class="input">
                                        <?php echo $a_years[$i]; ?>
                                    </p>
                                    <?php }}?>
                                </div>
                            </div>
                            <div class="break">
                                <span class="gender-title">Engagement rounds </span>
                                <div class="checkbox">
                                    <label class="checkbox-container">
                                        <input class="custom-checkbox" id="r-1" type="checkbox" disabled>
                                        <span class="checkmark"></span>
                                        <span class="gender">1st round </span>
                                    </label>
                                    <label class="checkbox-container">
                                        <input class="custom-checkbox" id="r-2" type="checkbox" disabled>
                                        <span class="checkmark"></span>
                                        <span class="gender">2nd round </span>
                                    </label>
                                    <label class="checkbox-container">
                                        <input class="custom-checkbox" id="r-3" type="checkbox" disabled>
                                        <span class="checkmark"></span>
                                        <span class="gender">3rd round </span>
                                    </label>
                                    <label class="checkbox-container">
                                        <input class="custom-checkbox" id="r-4" type="checkbox" disabled>
                                        <span class="checkmark"></span>
                                        <span class="gender">4th round </span>
                                    </label>
                                    <label class="checkbox-container">
                                        <input class="custom-checkbox" id="r-5" type="checkbox" disabled>
                                        <span class="checkmark"></span>
                                        <span class="gender">5th round</span>
                                    </label>
                                </div>

                            </div>
                            <div class="break">
                                <span class="gender-title">if wounded at the battlefield </span>
                                <div class="radio-button-container">
                                    <div class="radio-button">
                                        <input type="radio" class="radio-button__input" id="wound" name="iswounded"
                                            disabled>
                                        <label class="radio-button__label" for="wound">
                                            <span class="radio-button__custom"></span>
                                            Wounded
                                        </label>
                                    </div>
                                    <div class="radio-button">
                                        <input type="radio" class="radio-button__input" id="nwound" name="iswounded"
                                            disabled>
                                        <label class=" radio-button__label" for="nwound">
                                            <span class="radio-button__custom"></span>
                                            Not wounded
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="break">
                                <span class="gender-title">warrior's status</span> <br>
                                <div class="radio-button-container">
                                    <div class="radio-button">
                                        <input type="radio" class="radio-button__input" id="alive" name="warrior_s"
                                            disabled>
                                        <label class="radio-button__label" for="alive">
                                            <span class="radio-button__custom"></span>
                                            Alive
                                        </label>
                                    </div>
                                    <div class="radio-button">
                                        <input type="radio" class="radio-button__input" id="dead" name="warrior_s"
                                            disabled>
                                        <label class="radio-button__label" for="dead">
                                            <span class="radio-button__custom"></span>
                                            Dead
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="input-box" id="work">
                                <span class="details">Work Experience</span>
                                <div class="wrapper <?php echo ($exp_amount) ? "not" : '' ?> wrapper_2">
                                    <?php if($exp_amount) { ?>
                                    <span class="details">Experience</span>
                                    <span class="details">year</span>
                                    <?php for($i = 0; $i < $exp_amount; $i++) { ?>

                                    <p class="input">
                                        <?php echo $exps[$i]; ?>
                                    </p>
                                    <p class="input">
                                        <?php echo $exp_years[$i]; ?>
                                    </p>
                                    <?php }}?>
                                </div>
                            </div>
                        </div>

                        <div class="button hide">
                            <a href="" class="btn " onclick="window.print()">
                                <ion-icon name="print"></ion-icon> print
                            </a>
                            <a href='<?php echo "form.php?id=$id";?>' class="btn">
                                <ion-icon name="create"></ion-icon> edit
                            </a>
                            <?php if(isset($_SESSION['access']) && ($_SESSION['access'] === "full")) : ?>
                            <a href='<?php echo "delete.php?id=$id&type=war";?>' class=" btn">
                                <ion-icon name="trash"></ion-icon>
                                delete
                            </a>
                            <?php endif ?>
                        </div>
                        <script>
                        document.body.classList.add('war');
                        </script>
                        <?php }
                        elseif ($_GET['type'] == "rel") { ?>
                        <?php $table = $_GET['table']; ?>
                        <div class="print rel">
                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details">Family ID</span>
                                    <p class="input">
                                        <?php echo $id ?>
                                    </p>
                                </div>

                                <div class="input-box">
                                    <span class="details">FullName</span>
                                    <p class="input">
                                        <?php echo $uname ?>
                                    </p>
                                </div>
                                <div class="input-box">
                                    <span class="details">Family type</span>
                                    <p class="input"><?php echo $mem ?></p>
                                </div>
                                <div class="input-box">
                                    <span class="details">Status</span>
                                    <p class="input"><?php echo $status ?></p>
                                </div>

                                <div class="input-box">
                                    <span class="details">Duration</span>
                                    <p class="input">
                                        <?php echo $dur ?>
                                    </p>
                                </div>
                                <div class="input-box">
                                    <span class="details">Level of Education</span>
                                    <p class="input">
                                        <?php echo $lvl ?>
                                    </p>
                                </div>
                            </div>

                        </div>

                        <div class="button hide">
                            <a href="" class="btn " onclick="window.print()">
                                <ion-icon name="print"></ion-icon> print
                            </a>
                            <a href='<?php echo"relative.php?id=$id&uname=$uname";?>' class=" btn">
                                <ion-icon name="create"></ion-icon> edit
                            </a>
                            <?php if(isset($_SESSION['access']) && ($_SESSION['access'] === "full")) : ?>
                            <a href='<?php echo "delete.php?id=$id&uname=$uname&type=rel&table=$table";?>' class="btn">
                                <ion-icon name="trash"></ion-icon>
                                delete
                            </a>
                            <?php endif ?>
                        </div>
                        <script>
                        document.body.classList.add('rel');
                        </script>
                        <?php } ?>



                    </div>
                </div>
            </div>
        </div>

        <!-- =========== Scripts =========  -->
        <script type="module" src="assets/js/main.js"></script>

        <script>
        var r1 = document.getElementById('r-1');
        var r2 = document.getElementById('r-2');
        var r3 = document.getElementById('r-3');
        var r4 = document.getElementById('r-4');
        var r5 = document.getElementById('r-5');
        var wound = document.getElementById('wound');
        var nwound = document.getElementById('nwound');
        var alive = document.getElementById('alive');
        var dead = document.getElementById('dead');

        <?php if($iswounded == 'wounded') { ?>
        wound.checked = true;
        <?php } elseif ($iswounded == 'not wounded') { ?>
        nwound.checked = true;
        <?php } ?>
        <?php if($warrior_s == 'Alive') { ?>
        alive.checked = true;
        <?php } elseif ($warrior_s == 'Dead') { ?>
        dead.checked = true;
        <?php } ?>

        <?php foreach ($round as $key => $data) { ?>
        console.log('<?php echo $data; ?>');
        if ('<?php echo $data; ?>' == '1st round') {
            r1.checked = true;
        } else if ('<?php echo $data; ?>' == '2nd round') {
            r2.checked = true;
        } else if ('<?php echo $data; ?>' == '3rd round') {
            r3.checked = true;
        } else if ('<?php echo $data; ?>' == '4th round') {
            r4.checked = true;
        } else if ('<?php echo $data; ?>' == '5th round') {
            r5.checked = true;
        }
        <?php } ?>
        </script>
        <script>
        function activator() {
            var profile = document.querySelector(".profile");
            profile.classList.toggle("active");
        }
        </script>
        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js">
        </script>
</body>

</html>