<?php
include 'connect.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $keys = array_keys($_POST); // Get the keys of the array

  $keyToRemove = array("round", "exp", "exp_year", "award", "presenter", "a_year", "file"); // Specify the key you want to remove

  foreach($keyToRemove as $remove) {
    if (($key = array_search($remove, $keys)) !== false) {
        unset($keys[$key]); // Remove the specific key
    }
  }

  foreach($keys as $key){
    if(empty(trim($_POST[$key]))){
      $_POST[$key] = "N/A";
    }elseif(is_null($_POST[$key])) {
      $_POST[$key] = "N/A";
    }
  }


  $id = trim($_POST["u_id"]);
  $reg_id = trim($_POST['reg_id']);
  $image = $_FILES['file'];
  $imageName = $image['name'] ?? "N/A";
  $imageTmpName = $image['tmp_name'];
  $imageSize = $image['size'];
  $imageError = $image['error'];
  echo "$imageName $imageSize $imageError";
  echo "$id";
  $f_name = trim($_POST['f_name']);
  $u_name = trim($_POST['u_name']);
  $g_name = trim($_POST['g_name']);
  $m_name = trim($_POST['m_name']);
  $appellation = trim($_POST['appellation']);
  $b_date = trim($_POST['b_date']);
  $b_place = $_POST['b_place'];
  $nationality = $_POST['nationality'];
  $nation = $_POST['nation'];
  $bloodtype = $_POST['bloodtype'] ?? "N/A";
  $region = $_POST['region'];
  $warada = $_POST['warada'];
  $kebele = $_POST['kebele'];
  $h_number = $_POST['h_number'];
  $phone = $_POST['phone'];
  $po_box = $_POST['po_box'];
  $language = $_POST['language'] ?? 'N/A';
  $educ_lvl = $_POST['educ_lvl'] ?? "N/A";
  $educ_type = $_POST['educ_type'];
  $class = $_POST['class'];
  $c_year = $_POST['c_year'];
  (isset($_POST['round']) ? ($round = implode(',', $_POST['round'])) : ($round = "N/A"));
  $iswounded = $_POST['iswounded'] ?? "N/A";
  $warrior_s = $_POST['warrior_s'] ?? "N/A";
  $work = $_POST['work'] ?? "N/A";

  if (isset($_POST['exp']) && !empty($_POST['exp']) && (count($_POST['exp']) != 0)) {
    $exp = changeArray($_POST['exp']);
    $exp_year = changeArray($_POST['exp_year']);
    $exp_amount = count($_POST['exp']);
  } else {
    $exp_year = "none";
    $exp = "none";
    $exp_amount = 0;
  }
  
  if (isset($_POST['award']) && !empty($_POST['award']) && (count($_POST['award']) != 0)) {
    $award = changeArray($_POST['award']);
    $presenter = changeArray($_POST['presenter']);
    $a_year = changeArray( $_POST['a_year']);
    $award_amount = count($_POST['award']);
  }else{
    $award = "none";
    $presenter = "none";
    $a_year = "none";
    $award_amount = 0;
  }
  
  if(isset($_POST['id'])){
    $id=$_POST['id'];
    $u_id = $_POST['u_id'];

    if(isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK){
      $filename = uniqid('image_').'.'.pathinfo($imageName, PATHINFO_EXTENSION);
      // Set the path to save the uploaded image
      $imageDir = __DIR__.'/../image/';
      if (!is_dir($imageDir)) {
        mkdir($imageDir, 0777, true);
      }

      $imagePath = $imageDir.$filename;

      // Move the uploaded image to the specified path
      move_uploaded_file($imageTmpName, $imagePath);
      $imageName=$filename;

      $find="SELECT img FROM warrior WHERE id = '$id'";
      $res=mysqli_query($conn, $find);

      $previousImageName = mysqli_fetch_assoc($res)['img'] ?? "N/A";

      // Set the path of the previous image
      $previousImagePath = __DIR__.'/../image/'.$previousImageName;

      // Delete the previous image
      if(file_exists($previousImagePath)){
          unlink($previousImagePath);
      }
    }elseif ($imageError === UPLOAD_ERR_NO_FILE){
      $find="SELECT img FROM warrior WHERE id = '$id'";
      $res=mysqli_query($conn, $find);

      $ImageName = mysqli_fetch_assoc($res)['img'] ?? "N/A";
    }
    
    $data="UPDATE warrior SET id = '$u_id', reg_id = '$reg_id', img = '$imageName', u_name = '$u_name',f_name = '$f_name',g_name = '$g_name',
    m_name = '$m_name',appellation = '$appellation',b_date = '$b_date',b_place = '$b_place',
    nationality = '$nationality',nation = '$nation',bloodtype = '$bloodtype',region = '$region',
    warada = '$warada',kebele = '$kebele',h_number = '$h_number',phone = '$phone',
    po_box = '$po_box',lang = '$language',educ_lvl = '$educ_lvl',educ_type = '$educ_type',
    class = '$class', c_year = '$c_year',work = '$work',experience = '$exp',exp_year = '$exp_year',exp_amount = '$exp_amount',round = '$round',iswounded = '$iswounded',warrior_s = '$warrior_s',
    award = '$award',presenter = '$presenter',a_year = '$a_year', award_amount = '$award_amount' WHERE id = '$id'";

    
  }else{

    if($imageError === 0){
      // Set the path to save the uploaded image
     $filename = uniqid('image_').'.'.pathinfo($imageName, PATHINFO_EXTENSION);
      // Set the path to save the uploaded image
      $imageDir = __DIR__.'/../image/';
      if (!is_dir($imageDir)) {
        mkdir($imageDir, 0777, true);
      }

      $imagePath = $imageDir.$filename;

      // Move the uploaded image to the specified path
      move_uploaded_file($imageTmpName, $imagePath);
      $imageName=$filename;
    }elseif ($imageError === UPLOAD_ERR_NO_FILE){
      $ImageName = "N/A";
    }
    $data="INSERT INTO warrior (id, reg_id, img, u_name,f_name,g_name,m_name,appellation,b_date,
    b_place,nationality,nation,bloodtype,region,warada,kebele,h_number,phone,po_box,lang,
    educ_lvl,educ_type,class,c_year,work,experience,exp_year,exp_amount,round,iswounded,warrior_s,award, presenter, a_year,award_amount)
    VALUES ('$id', '$reg_id', '$imageName', '$u_name','$f_name','$g_name','$m_name','$appellation','$b_date',
    '$b_place','$nationality','$nation','$bloodtype','$region','$warada',
    '$kebele','$h_number','$phone','$po_box','$language','$educ_lvl',
    '$educ_type','$class','$c_year','$work','$exp','$exp_year','$exp_amount','$round','$iswounded','$warrior_s','$award', '$presenter', '$a_year','$award_amount')";
  }
    
  $result=mysqli_query($conn, $data);

  if($result){
    // echo "Data inserted successfully\n";
    header('location: /index.php');
  }else{
    die(mysqli_error($conn));
  }
}

function changeArray($data) {
 return implode(",", $data);
}
?>