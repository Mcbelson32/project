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
  }elseif ($key == "experience" || $key == "award") {
    if(empty(trim($_POST[$key]))){
      $_POST[$key] = "Not spacified";
    }
  }
}

  $id = trim($_POST["u_id"]);
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
  (isset($_POST['round']) ? $round = implode(',', $_POST['round']) : $round = "N/A");
  $iswounded = $_POST['iswounded'] ?? "N/A";
  $warrior_s = $_POST['warrior_s'] ?? "N/A";
  $exp = trim($_POST['experience']) ;
  $award = trim($_POST['award']);
  
  if(isset($_POST['id'])){
    $id=$_POST['id'];
    $u_id = $_POST['u_id'];
    $data="UPDATE warrior SET id = '$u_id',u_name = '$u_name',f_name = '$f_name',g_name = '$g_name',
    m_name = '$m_name',appellation = '$appellation',b_date = '$b_date',b_place = '$b_place',
    nationality = '$nationality',nation = '$nation',bloodtype = '$bloodtype',region = '$region',
    warada = '$warada',kebele = '$kebele',h_number = '$h_number',phone = '$phone',
    po_box = '$po_box',lang = '$language',educ_lvl = '$educ_lvl',educ_type = '$educ_type',
    class = '$class', c_year = '$c_year',work = '$work',round = '$round',iswounded = '$iswounded',warrior_s = '$warrior_s',
    experience = '$exp', award = '$award' WHERE id = '$id'";

  }else{
    $data="INSERT INTO warrior (id,u_name,f_name,g_name,m_name,appellation,b_date,
    b_place,nationality,nation,bloodtype,region,warada,kebele,h_number,phone,po_box,lang,
    educ_lvl,educ_type,class,c_year,work,round,iswounded,warrior_s,experience,award)
  VALUES ('$id','$u_name','$f_name','$g_name','$m_name','$appellation','$b_date',
'$b_place','$nationality','$nation','$bloodtype','$region','$warada',
'$kebele','$h_number','$phone','$po_box','$language','$educ_lvl',
  '$educ_type','$class','$c_year','$work','$round','$iswounded','$warrior_s','$exp','$award')";
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