<?php
include './server/session.php';
include './server/fetch.php';
include 'array.php';
if(isset($_GET['id']) && isset($_GET['uname'])) {
    $conn->select_db("warriorsdb");
    $id = $_GET['u_id'];
    $uname = $_GET['uname'];
    
    $sql="SELECT * FROM warrior WHERE id='$id'";
    $res=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($res);
    $table=$row['u_name'].$row['f_name'];

    $conn->select_db("family");
    $sql="SELECT * FROM `$table` WHERE uname='$uname'";
    $res=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($res);
    
    $id = $row['id'] ?? "N/A";
    $u_id = $row['u_id'] ?? "N/A";
    $uname=$row['uname'] ?? "N/A";
    $mem = $row['member'] ?? "N/A";
    $status = $row['status'] ?? "N/A";
    (isset($row['duration'])) ? ($duration = explode(' - ', $row['duration'])) : ($duration = array("N/A", "N/A"));
    $b_date = $row['b_date'] ?? "N/A";
    $educ_lvl = $row['educ_lvl'] ?? "N/A";
    
}
  $err = "The Family ID is not found! Please insert the valid ID ";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relative's Form</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css?v=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/form.css?v=1.0">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="pop" id="pop">
            <p><?php echo $err; ?></p>
        </div>
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
            <div class="cardBox">
                <div class="card" onclick="window.location.href = 'warriors.php'">
                    <div>
                        <div class="numbers"><?php echo $total ?></div>
                        <div class="cardName">Veterans</div>
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
                            <?php if(isset($_GET['id']) && isset($_GET['uname'])): ?>
                            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                            <?php endif ?>
                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details">Veteran's ID</span>
                                    <input type="text" name="u_id" id="u_id" placeholder="Enter your ID" required
                                        value="<?php if(isset($_GET['id']) && isset($_GET['uname'])){echo $u_id;}?>">
                                </div>

                                <div class="input-box">
                                    <span class="details">Full Name</span>
                                    <input type="text" name="u_name" id="u_name" placeholder="Enter your name" required
                                        value="<?php if(isset($_GET['id']) && isset($_GET['uname'])){echo $uname;}?>">
                                </div>

                                <div class="input-box">
                                    <span class="details">relativity</span>
                                    <select name="type" id="type">
                                        <option value="Wife">Wife</option>
                                        <option value="Child">Child</option>
                                        <option value="Grandchild">Grandchild</option>
                                        <option value="Representative">Representative</option>
                                    </select>
                                </div>

                                <div class="input-box">
                                    <span class="details">Status</span>

                                    <select name="status" id="status">
                                        <option value="Alive">Alive</option>
                                        <option value="Dead">Dead</option>
                                        <option value="Divorced">Divorced</option>
                                    </select>
                                </div>
                                <div class="input-box">
                                    <span class="details">Birth Date</span>
                                    <input type="text" name="b_date" id="b_date"
                                        value="<?php if(isset($_GET['id']) && isset($_GET['uname'])){echo $b_date;}?>"
                                        oninput="dateFormat(this)" placeholder="yyyy-mm-dd">
                                </div>
                                <div class="input-box">
                                    <span class="details">level of education</span>

                                    <select name="educ_lvl" id="educ_lvl">
                                        <option value="primary">Primary School</option>
                                        <option value="secondary">Secondary School</option>
                                        <option value="preparatory">Preparatory School</option>
                                        <option value="Diploma">Diploma</option>
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
                                <input type="text" name="start" id="start" pattern="\d{4}-\d{2}-\d{2}"
                                    oninput="dateFormat(this)" placeholder="yyyy-mm-dd">
                                -
                                <input type="text" name="end" id="end" pattern="\d{4}-\d{2}-\d{2}"
                                    oninput="dateFormat(this)" placeholder="yyyy-mm-dd">
                            </div>
                            <div class="button">
                                <?php if (isset($_GET['id']) && isset($_GET['uname'])) { ?>
                                <input type="submit" value="update">
                                <?php }else{ ?>
                                <input type="submit" value="Register" onclick="checkID()">
                                <?php } ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- =========== Scripts =========  -->
        <script type="module" src="assets/js/main.js"></script>

        <script>
        function dateFormat(input) {
            var value = input.value.replace(/-/g, "");

            if (value.length > 4) {
                value = value.slice(0, 4) + "-" + value.slice(4);
            }
            if (value.length > 7) {
                value = value.slice(0, 7) + "-" + value.slice(7);
            }
            if (value.length > 10) {
                value = value.slice(0, 10);
            }

            input.value = value;
        }

        var lvl = document.getElementById('educ_lvl');
        var mem = document.getElementById('type');
        var stat = document.getElementById('status');
        var start = document.getElementById('start');
        var end = document.getElementById('end');
        lvl.value = '<?php if(isset($_GET['id']) && isset($_GET['uname'])){echo $educ_lvl;}else{echo "";}?>';
        mem.value = '<?php if(isset($_GET['id']) && isset($_GET['uname'])){echo $mem;}else{echo "";}?>';
        stat.value = '<?php if(isset($_GET['id']) && isset($_GET['uname'])){echo $status;}else{echo "";}?>';
        let originalDate = "";
        let dateParts = '';
        let modDate = '';
        let formattedDate = '';
        let dateInput = '';
        <?php if(isset($_GET['id']) && isset($_GET['uname'])) { ?>
        <?php for($i=0; $i<2; $i++) { ?>
        originalDate = '<?php echo $duration[$i] ?> ';

        // Split the date string by "/"
        dateParts = originalDate.split("/");

        // Rearrange the date parts in "yyyy-mm-dd" format
        modDate = dateParts[0] + "-" + dateParts[1] + "-" + dateParts[2];
        formattedDate = new Date(modDate);
        dateInput = formattedDate.toISOString().split("T")[0];
        <?php if($i == 0){ ?>
        start.value = dateInput;
        <?php } else { ?>
        end.value = dateInput;
        <?php } ?> <?php } ?>
        <?php } ?>

        function checkID() {
            var form = document.getElementById('form');

            form.addEventListener('submit', (e) => {
                e.preventDefault();
            });

            var id = document.getElementById('u_id').value;

            // Create a new XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Prepare the request
            xhr.open('POST', 'check.php?type=rel', true); // Replace with the actual PHP file name
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            // Set up the callback function
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = xhr.responseText.trim();
                        if (response === "success") {
                            form.submit();
                        } else if (response === "error") {
                            popToggler();
                        }
                    }
                }
            };

            // Send the request
            xhr.send('id=' + encodeURIComponent(id));
        }

        function popToggler() {
            var pop = document.getElementById('pop');
            pop.classList.add("active");
            setTimeout(() => {
                pop.classList.remove("active");
            }, 8000);
        }

        function activator() {
            var profile = document.querySelector(".profile");
            profile.classList.toggle("active");
        }
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