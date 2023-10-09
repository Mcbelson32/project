<?php
include 'connect.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $keys = array_keys($_POST); // Get the keys of the array

  $keyToRemove = "round"; // Specify the key you want to remove

  if (($key = array_search($keyToRemove, $keys)) !== false) {
      unset($keys[$key]); // Remove the specific key
  }

  foreach($keys as $key){
    if(empty(trim($_POST[$key]))){
      $_POST[$key] = "N/A";
    }elseif(is_null($_POST[$key])) {
      $_POST[$key] = "N/A";
    }
  }


  $id = trim($_POST["u_id"]);
  $image = $_FILES['file'];
    // Image details
  $imageName = $image['name'];
  $imageTmpName = $image['tmp_name'];
  $imageSize = $image['size'];
  $imageError = $image['error'];
  
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
  $work = $_POST['work'];
  (isset($_POST['round']) ? ($round = implode(',', $_POST['round'])) : ($round = "N/A"));
  $iswounded = $_POST['iswounded'] ?? "N/A";
  $warrior_s = $_POST['warrior_s'] ?? "N/A";
  $exp = trim($_POST['experience']) ;
  $award = trim($_POST['award']);
  
  if(isset($_POST['id'])){
    $id=$_POST['id'];
    $u_id = $_POST['u_id'];
    if(!$image) {
      $imageName =  $_POST['imgName'];
    }
    $data="UPDATE warrior SET id = '$u_id', img = '$imageName', u_name = '$u_name',f_name = '$f_name',g_name = '$g_name',
    m_name = '$m_name',appellation = '$appellation',b_date = '$b_date',b_place = '$b_place',
    nationality = '$nationality',nation = '$nation',bloodtype = '$bloodtype',region = '$region',
    warada = '$warada',kebele = '$kebele',h_number = '$h_number',phone = '$phone',
    po_box = '$po_box',lang = '$language',educ_lvl = '$educ_lvl',educ_type = '$educ_type',
    class = '$class', c_year = '$c_year',work = '$work',round = '$round',iswounded = '$iswounded',warrior_s = '$warrior_s',
    experience = '$exp', award = '$award' WHERE id = '$id'";

    if($imageError === 0){
      // Set the path to save the uploaded image
      $imagePath = '../image/'.$imageName;

      // Move the uploaded image to the specified path
      move_uploaded_file($imageTmpName, $imagePath);
      $find="SELECT img FROM warrior WHERE id = '$id'";
      $res=mysqli_query($conn, $find);

      $previousImageName = mysqli_fetch_array($res)['img'] or "none";

      // Set the path of the previous image
      $previousImagePath = '../image/'.$previousImageName;

      // Delete the previous image
      if(file_exists($previousImagePath)){
          unlink($previousImagePath);
      }
    }
  }else{
    $data="INSERT INTO warrior (id, img, u_name,f_name,g_name,m_name,appellation,b_date,
    b_place,nationality,nation,bloodtype,region,warada,kebele,h_number,phone,po_box,lang,
    educ_lvl,educ_type,class,c_year,work,round,iswounded,warrior_s,experience,award)
  VALUES ('$id', '$imageName', '$u_name','$f_name','$g_name','$m_name','$appellation','$b_date',
'$b_place','$nationality','$nation','$bloodtype','$region','$warada',
'$kebele','$h_number','$phone','$po_box','$language','$educ_lvl',
  '$educ_type','$class','$c_year','$work','$round','$iswounded','$warrior_s','$exp','$award')";

    if($imageError === 0){
      // Set the path to save the uploaded image
      $imagePath = '../image/'.$imageName;

      // Move the uploaded image to the specified path
      move_uploaded_file($imageTmpName, $imagePath);
    }
  }
  echo $data;
  $result=mysqli_query($conn, $data);

  if($result){
    // echo "Data inserted successfully\n";
    header('location: /index.php');
  }else{
    die(mysqli_error($conn));
  }
}
?>