<?php
function changeFamily ($conn, $id, $uname, $fname) {
    $new_name = $uname.$fname;
    $conn->select_db("warriorsdb");
    $sql = "SELECT * FROM warrior WHERE id='$id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $name = $row['u_name'].$row['f_name'];
    $conn->select_db("family");
    $sql = "SELECT * FROM information_schema.tables WHERE table_name='$name'";
    $res = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($res)['TABLE_NAME'];
    if (mysqli_num_rows($res) && ($data != $new_name)) {
        $sql = "RENAME TABLE `$name` TO `$new_name`";
        $res = mysqli_query($conn, $sql);
        if (!$res) {
            die(mysqli_error($conn));
        }
    }
    $conn->select_db("warriorsdb");
}
?>