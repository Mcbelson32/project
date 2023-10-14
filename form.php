<?php
include './server/session.php';
include './server/fetch.php';
include 'array.php';
if(isset($_GET['id'])) {
    $conn->select_db("warriorsdb");
    $id = $_GET['id'];
    $sql="SELECT * FROM warrior WHERE id='$id'";
    $result=mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    $u_id = $row['id'] ?? "N/A";
    $reg_id = $row['reg_id'] ?? "N/A";
    $u_name=$row['u_name'] ?? "N/A";
    $img = $row['img'] ?? "N/A";
    $f_name = $row['f_name'] ?? "N/A";
    $g_name = $row['g_name'] ?? "N/A";
    $m_name = $row['m_name'] ?? "N/A";
    $appellation = $row['appellation'] ?? "N/A";
    $b_date = $row['b_date'] ?? "N/A";
    $b_place = $row['b_place'] ?? "N/A";
    $nationality = $row['nationality'] ?? "N/A";
    $nation = $row['nation'] ?? "N/A";
    $bloodtype = $row['bloodtype'] ?? "N/A";
    $region = $row['region'] ?? "N/A";
    $warada = $row['warada'] ?? "N/A";
    $kebele = $row['kebele'] ?? "N/A";
    $h_number = $row['h_number'] ?? "N/A";
    $phone = $row['phone'] ?? "N/A";
    $po_box = $row['po_box']?? "N/A";
    $language = explode(',', $row['lang']) ?? 'N/A';
    $educ_lvl = $row['educ_lvl'] ?? "N/A";
    $educ_type = $row['educ_type'] ?? "N/A";
    $class = $row['class'] ?? "N/A";
    $c_year = $row['c_year'] ?? "N/A";
    $work = $row['work'] ?? "N/A";
    $exps = explode(',', $row['experience']) ?? "none";
    $exp_year_start = explode(',', $row['exp_year_start']) ?? "none";
    $exp_year_end = explode(',', $row['exp_year_end']) ?? "none";
    $exp_amount = intval($row['exp_amount']) ?? 0;
    $round = explode(',', $row['round']);
    $iswounded = $row['iswounded'] ?? "N/A";
    $warrior_s = $row['warrior_s'] ?? "N/A";
    $awards = explode(',', $row['award']) ?? "none";
    $presenters = explode(',', $row['presenter']) ?? "none";
    $award_amount = intval($row['award_amount']) ?? 0;
    
  }
  $err = "Either of the ID has already been taken! Please use another ID ";
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veteran's Form</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css?v=1.0">
    <link rel="stylesheet" type="text/css" href="./assets/css/form.css?v=1.0">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="pop" id="pop">
            <p><?php echo $err ?> </p>
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
                        <div class="numbers"><?php echo $total ?>
                        </div>
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
                        <form action="./server/data.php" id="form" method="POST" enctype="multipart/form-data"
                            accept-charset="utf-8">
                            <?php if (isset($_GET['id'])) { ?>

                            <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']?>">
                            <?php } ?>
                            <div class="user-details ">
                                <div class="input-box">
                                    <span class="details">Veteran's ID</span>
                                    <input type="tel" name="u_id" id="u_id" placeholder="Enter your veteran ID" required
                                        value="<?php if(isset($_GET['id'])){echo $u_id;}?>">
                                </div>
                                <div class="input-box">
                                    <span class="details">Register ID</span>
                                    <input type="tel" name="reg_id" id="reg_id" placeholder="Enter your register ID"
                                        required value="<?php if(isset($_GET['id'])){echo $reg_id;}?>">
                                </div>
                                <div class="input-box">
                                    <span class="details">Veteran's picture</span>
                                    <label for="file-upload" class="file-upload">
                                        <span class="file-upload-label">Choose the image</span>
                                        <input id="file-upload" type="file" name="file" accept=".png, .jpg, .jpeg"
                                            onchange="handleFileInputChange(event)">
                                    </label>
                                    <div class="selected-file-container">
                                        <span class="selected-file" style="display: none;"></span>
                                        <span class="remove-file" onclick="removeFile()">Remove</span>
                                    </div>

                                </div>

                                <div class="input-box">
                                    <span class="details">User Name</span>
                                    <input type="text" name="u_name" id="u_name" placeholder="Enter your name" required
                                        value="<?php if(isset($_GET['id'])){echo $u_name;}?>">
                                </div>
                                <div class="input-box">
                                    <span class="details">Father's Name</span>
                                    <input type="text" placeholder="Enter The Name" name="f_name" id="f_name" required
                                        value="<?php if(isset($_GET['id'])){echo $f_name;}?>">
                                </div>
                                <div class="input-box">
                                    <span class="details">GrandFather's Name</span>
                                    <input type="text" placeholder="Enter The Name" name="g_name" id="g_name"
                                        value="<?php if(isset($_GET['id'])){echo $g_name;}?>">
                                </div>

                                <div class="input-box">
                                    <span class="details">Mother's FullName</span>
                                    <input type="text" placeholder="Enter the Name" name="m_name" id="m_name"
                                        value="<?php if(isset($_GET['id'])){echo $m_name;}?>">
                                </div>
                                <div class="input-box">
                                    <span class="details">Appellation</span>
                                    <input type="text" placeholder="Enter your Appellation" name="appellation"
                                        id="appellation" value="<?php if(isset($_GET['id'])){echo $appellation;}?>">
                                </div>

                                <div class="input-box">
                                    <span class="details">Birth Date</span>
                                    <input type="text" name="b_date" id="b_date"
                                        value="<?php if(isset($_GET['id'])){echo $b_date;}?>"
                                        oninput="dateFormat(this); birthCheck(this)" placeholder="yyyy-mm-dd"
                                        min="1951-00-00" max="1955-00-00">
                                </div>
                                <div class="input-box">
                                    <span class="details">Birth Place</span>
                                    <input type="text" name="b_place" id="b_place" placeholder="Confirm your birthplace"
                                        value="<?php if(isset($_GET['id'])){echo $b_place;}?>">
                                </div>
                                <div class="input-box">
                                    <span class="details">Nationality</span>
                                    <input type="text" name="nationality" id="nationality"
                                        placeholder="Confirm your Nationality"
                                        value="<?php if(isset($_GET['id'])){echo $nationality;}?>">
                                </div>
                                <div class="input-box">
                                    <span class="details">Nation</span>
                                    <input type="text" name="nation" id="nation" placeholder="Confirm your Nation"
                                        value="<?php if(isset($_GET['id'])){echo $nation;}?>">
                                </div>
                                <div class="input-box">
                                    <span class="details">Blood Type</span>

                                    <select name="bloodtype" id="bloodtype" value="">
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="" selected></option>
                                    </select>

                                </div>
                                <div class="input-box">
                                    <span class="details">Region</span>
                                    <input type="text" name="region" id="region" placeholder="Confirm your region"
                                        value="<?php if(isset($_GET['id'])){echo $region;}?>">
                                </div>
                                <div class="input-box">
                                    <span class="details">Warada</span>
                                    <input type="text" name="warada" id="warada" placeholder="Confirm your warada"
                                        value="<?php if(isset($_GET['id'])){echo $warada;}?>">
                                </div>

                                <div class="input-box">
                                    <span class="details">kebele</span>
                                    <input type="tel" name="kebele" id="kebele" placeholder="Confirm your kebele"
                                        value="<?php if(isset($_GET['id'])){echo $kebele;}?>">
                                </div>

                                <div class="input-box">
                                    <span class="details">H.number</span>
                                    <input type="tel" name="h_number" id="h_number" placeholder="Confirm your H.Number"
                                        value="<?php if(isset($_GET['id'])){echo $h_number;}?>">
                                </div>


                                <div class="input-box">
                                    <span class="details">Phone Number</span>
                                    <input type="tel" name="phone" id="phone" placeholder="+********"
                                        value="<?php if(isset($_GET['id'])){echo $phone;}?>">
                                </div>
                                <div class="input-box">
                                    <span class="details">P.O Box</span>
                                    <input type="tel" name="po_box" id="po_box" placeholder="Confirm your PO box"
                                        value="<?php if(isset($_GET['id'])){echo $po_box;}?>">
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
                                        <option value="uneducated">Uneducated</option>
                                        <option value="" selected></option>
                                    </select>
                                </div>

                                <div class="input-box">
                                    <span class="details">Education types</span>
                                    <input type="text" name="educ_type" id="educ_type" placeholder="education type"
                                        value="<?php if(isset($_GET['id'])){echo $educ_type;}?>">
                                </div>
                                <div class="input-box">
                                    <span class="details">Veteran's class</span>
                                    <input type="text" name="class" id="class" placeholder="class"
                                        value="<?php if(isset($_GET['id'])){echo $class;}?>">
                                </div>
                                <div class="input-box">
                                    <span class="details">Class year</span>
                                    <input type="number" name="c_year" id="c_year" min="1800" max=""
                                        value="<?php if(isset($_GET['id'])){echo $c_year;}?>">
                                </div>
                                <div class="input-box">
                                    <span class="details">work</span>
                                    <input type="text" name="work" id="work" placeholder="Confirm your work"
                                        value="<?php if(isset($_GET['id'])){echo $work;}?>">
                                </div>

                                <div class="input-box">
                                    <span class="details">Language</span>

                                    <select name="language[]" id="language" multiple>
                                        <option value="Amharic">Amharic</option>
                                        <option value="English">English</option>
                                        <option value="Oromo">Oromo</option>
                                        <option value="Tigrinya">Tigrinya</option>
                                        <option value="Italian">Italian</option>
                                        <option value="Korean">Korean</option>
                                        <option value=""></option>
                                    </select>
                                </div>

                            </div>
                            <div class="input-box">
                                <span class="details">Award & Presenter <br><br>
                                    <input type="text" name="award-table" id="award-table"
                                        placeholder="Insert the amount of Row(s)">
                                    <button type="button" class="c_btn" onclick="awardTable()">Create</button>
                                </span>
                                <div class="wrapper wrapper_1">
                                    <?php if(isset($_GET['id']) && $award_amount) { ?>
                                    <span>award</span>
                                    <span>presenter</span>
                                    <?php for($i = 0; $i < $award_amount; $i++) { ?>
                                    <input type="text" name="award[]" class="award" placeholder="Enter the award"
                                        value="<?php echo $awards[$i]; ?>">
                                    <input type="text" name="presenter[]" class="award"
                                        placeholder="Enter the presenter" value="<?php echo $presenters[$i]; ?>">

                                    <?php }
                                } ?>

                                </div>

                            </div>

                            <span class="gender-title">Engagement rounds</span> <br>
                            <div class="category">
                                <label for="r-1">
                                    <input type="checkbox" name="round[]" id="r-1" value="1st round">
                                    <span class="gender">&nbsp; 1st round </span>
                                </label>
                                <label for="r-2">
                                    <input type="checkbox" name="round[]" id="r-2" value="2nd round">
                                    <span class="gender">&nbsp; 2nd round</span>
                                </label>
                                <label for="r-3">
                                    <input type="checkbox" name="round[]" id="r-3" value="3rd round">
                                    <span class="gender">&nbsp; 3rd round</span>
                                </label>
                                <label for="r-4">
                                    <input type="checkbox" name="round[]" id="r-4" value="4th round">
                                    <span class="gender">&nbsp; 4th round</span>
                                </label>
                                <label for="r-5">
                                    <input type="checkbox" name="round[]" id="r-5" value="5th round">
                                    <span class="gender">&nbsp; 5th round</span>
                                </label>
                            </div>

                            <span class="gender-title">if wounded at the battlefield </span> <br>
                            <div class="category">
                                <label for="wound-1">
                                    <input type="radio" name="iswounded" id="wound-1" value="wounded"
                                        <?php if(isset($_GET['id'])){if($iswounded == "wounded"){echo "checked";}}?>>
                                    <span class="gender">&nbsp; wounded </span>
                                </label>
                                <label for="wound-2">
                                    <input type="radio" name="iswounded" id="wound-2" value="not wounded"
                                        <?php if(isset($_GET['id'])){if($iswounded == "not wounded"){echo "checked";}}?>>
                                    <span class="gender">&nbsp; not wounded</span>
                                </label>
                            </div>


                            <span class="gender-title">Veteran's status</span> <br>
                            <div class="category">
                                <label for="war-1">
                                    <input type="radio" name="warrior_s" id="war-1" value="Alive"
                                        <?php if(isset($_GET['id'])){if($warrior_s == "Alive"){echo "checked";}}?>>
                                    <span class="gender">&nbsp;Alive</span>
                                </label>
                                <label for="war-2">
                                    <input type="radio" name="warrior_s" id="war-2" value="Dead"
                                        <?php if(isset($_GET['id'])){if($warrior_s == "Dead"){echo "checked";}}?>>
                                    <span class="gender">&nbsp;Dead</span>
                                </label>
                            </div>

                            <div class="input-box">
                                <span class="details">Work Experience <br><br>
                                    <input type="text" name="work-table" id="work-table"
                                        placeholder="Insert the amount of Row(s)">
                                    <button type="button" class="c_btn" onclick="workTable()">Create</button>
                                </span>
                                <div class="wrapper wrapper_2">
                                    <?php if(isset($_GET['id']) && $exp_amount) { ?>
                                    <span>Experience</span>
                                    <span>From (year)</span>
                                    <span>To (year)</span>
                                    <?php for($i = 0; $i < $exp_amount; $i++) { ?>
                                    <input type="text" name="exp[]" class="exp" placeholder="Enter the experience"
                                        value="<?php echo $exps[$i]; ?>">
                                    <input type="text" name="exp_year_start[]" class="exp" oninput="dateFormat(this)"
                                        placeholder="yyyy-mm-dd" value="<?php echo $exp_year_start[$i]; ?>">
                                    <input type="text" name="exp_year_end[]" class="exp" oninput="dateFormat(this)"
                                        placeholder="yyyy-mm-dd" value="<?php echo $exp_year_end[$i]; ?>">
                                    <?php }}?>
                                </div>
                            </div>


                            <div class="button">
                                <?php if (isset($_GET['id'])) { ?>
                                <input type="submit" value="<?php echo "Update";?>" onclick="fillTable()">
                                <?php }else{ ?>
                                <input type="submit" value="<?php echo "Register";?>" onclick="checkID()">
                                <?php } ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
    .file-upload {
        width: 100%;
        display: inline-block;
        padding: 10px 35px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
        color: #555;
        cursor: pointer;
        text-align: center;
    }

    .file-upload input[type="file"] {
        display: none;
    }

    .file-upload-label {
        text-align: center;
        font-size: 16px;
    }

    .selected-file-container {
        display: flex;
        align-items: center;
        margin-top: 10px;
    }

    .selected-file {
        margin: 10px 0;
        font-size: 14px;
        font-weight: bold;
        color: #333;

    }

    .remove-file {
        color: white;
        cursor: pointer;
        padding: 5px 10px;
        background-color: red;
        border-radius: 10px;
        margin-left: 10px;
        font-size: 14px;
        display: none;
    }
    </style>
    <script>
    function fillTable() {
        document.getElementById('form').addEventListener('submit', function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();

            var work_input = document.getElementsByClassName('exp');
            var award_input = document.getElementsByClassName('award');

            // Check if both classes exist
            if (work_input.length > 0) {
                for (var i = 0; i < work_input.length; i++) {
                    if (work_input[i].value.trim() === '') {
                        work_input[i].value = "N/A";
                    }
                }
            }
            if (award_input.length > 0) {
                for (var x = 0; x < award_input.length; x++) {
                    if (award_input[x].value.trim() === '') {
                        award_input[x].value = "N/A";
                    }
                }
            }
            this.submit();

        });
    }
    </script>
    <script>
    function awardTable() {
        var amount = document.getElementById('award-table').value;
        var cont = document.querySelector('.wrapper_1');
        cont.innerHTML = ``;

        if (!(amount.trim() === "") && !isNaN(amount)) {

            cont.innerHTML += `
            <span>award</span>
            <span>presenter</span>`;

            for (let index = 0; index < amount; index++) {
                cont.innerHTML +=
                    `
                <input type="text" name="award[]" class="award" placeholder="Enter the award"> 
                <input type="text" name="presenter[]" class="award" placeholder="Enter the presenter">`;
            }
        }
    }

    function workTable() {
        var amount = document.getElementById('work-table').value;
        var cont = document.querySelector('.wrapper_2');
        cont.innerHTML = ``;

        if (!(amount.trim() === "") && !isNaN(amount)) {

            cont.innerHTML += `
            <span>Experience</span>
            <span>From (year)</span>
            <span>To (year)</span>`;

            for (let index = 0; index < amount; index++) {
                cont.innerHTML +=
                    `
                <input type="text" name="exp[]" class="exp" placeholder="Enter the experience"> 
                <input type="text" name="exp_year_start[]" class="exp" oninput="dateFormat(this)" placeholder="yyyy-mm-dd">
                <input type="text" name="exp_year_end[]" class="exp" oninput="dateFormat(this)" placeholder="yyyy-mm-dd">`;
            }
        }
    }

    function handleFileInputChange(event) {
        const fileInput = event.target;
        const fileName = fileInput.files[0].name;
        const selectedFileContainer = document.querySelector('.selected-file');
        const removeFileButton = document.querySelector('.remove-file');

        selectedFileContainer.textContent = fileName;
        selectedFileContainer.style.display = 'block';
        removeFileButton.style.display = 'inline-block';
    }

    function removeFile() {
        const fileInput = document.querySelector('#file-upload');
        const selectedFileContainer = document.querySelector('.selected-file');
        const removeFileButton = document.querySelector('.remove-file');

        fileInput.value = '';
        selectedFileContainer.textContent = '';
        selectedFileContainer.style.display = 'none';
        removeFileButton.style.display = 'none';
    }

    function birthCheck(input) {
        var value = input.value.replace(/-/g, "");
        if (value.length >= 4) {
            var year = parseInt(value.substring(0, 4));
            console.log(year);
            if (year < 1951 || year > 1955) {
                input.setCustomValidity('Please enter a year between 1951 and 1955');
            } else {
                input.setCustomValidity('');
            }
        }
    }

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
    </script>

    <!-- =========== Scripts =========  -->
    <script type="module" src="assets/js/main.js"></script>

    <script>
    const yearInput = document.getElementById('c_year');
    const currentYear = new Date().getFullYear();
    yearInput.max = currentYear;

    function checkID() {
        var form = document.getElementById('form');

        form.addEventListener('submit', (e) => {
            e.preventDefault();
        });

        var id = document.getElementById('u_id').value;
        var regId = document.getElementById('reg_id').value;
        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Prepare the request
        xhr.open('POST', 'check.php?type=war', true); // Replace with the actual PHP file name
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        // Set up the callback function
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var response = xhr.responseText.trim();
                    if (response === "success") {
                        fillTable();
                    } else if (response === "error") {
                        popToggler();
                    }
                }
            }
        };

        // Send the request
        xhr.send('id=' + encodeURIComponent(id) + '&reg_id=' + encodeURIComponent(regId));
    }

    function popToggler() {
        var pop = document.getElementById('pop');
        pop.classList.add("active");
        setTimeout(() => {
            pop.classList.remove("active");
        }, 8000);
    }
    </script>
    <!-- ====== ionicons ======= -->
    <script>
    var tag = document.getElementById('bloodtype');
    var lvl = document.getElementById('educ_lvl');
    var lang = document.getElementById('language');
    var r1 = document.getElementById('r-1');
    var r2 = document.getElementById('r-2');
    var r3 = document.getElementById('r-3');
    var r4 = document.getElementById('r-4');
    var r5 = document.getElementById('r-5');

    window.onload = () => {
        tag.value = '<?php echo isset($_GET['id']) ? $bloodtype : ""; ?>';
        lvl.value = '<?php echo isset($_GET['id']) ? $educ_lvl : ""; ?>';
        let opt = '';
        <?php if (isset($_GET['id'])) {
        foreach ($language as $lan) { ?>
        opt = '<?php echo $lan ?>';
        if (opt == "Amharic") {
            lang.options[0].selected = true;
        } else if (opt == "English") {
            lang.options[1].selected = true;
        } else if (opt == "Oromo") {
            lang.options[2].selected = true;
        } else if (opt == "Tigrinya") {
            lang.options[3].selected = true;
        } else if (opt == "Italian") {
            lang.options[4].selected = true;
        } else if (opt == "Korean") {
            lang.options[5].selected = true;
        } else {
            lang.options[6].selected = true;
        }

        <?php }} else { ?>
        lang.options[6].selected = true;
        <?php } ?>
    }

    let data = '';

    <?php foreach($round as $key) { ?>
    data = '<?php echo $key ?>';
    if (data == '1st round') {
        r1.checked = true;
    } else if (data == '2nd round') {
        r2.checked = true;
    } else if (data == '3rd round') {
        r3.checked = true;
    } else if (data == '4th round') {
        r4.checked = true;
    } else if (data == '5th round') {
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
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>