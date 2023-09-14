<?php
include './server/connect.php';
// Assuming you have already established a MySQL database connection
$conn->select_db("warriorsdb");

// Fetch data from the MySQL database
$query = "SELECT id, u_name, f_name, g_name FROM warrior";
$results = mysqli_query($conn, $query);

// Create an empty array to store the fetched data
$data = array();

// Loop through the result set and add each row as an associative array to the data array
while ($row = mysqli_fetch_assoc($results)) {
    $data[] = $row;
}
// Convert the PHP array to a JSON string
$jsonData = json_encode($data);
if (file_exists('assets/js/data.js')) {
    // Read the existing JavaScript file
    $existingData = file_get_contents('assets/js/data.js');

    // Replace the existing array value with the latest data
    $updatedData = preg_replace('/export var dataArray = .+;/s', "export var dataArray = $jsonData;", $existingData);

    // Write the updated data to the JavaScript file
    file_put_contents('assets/js/data.js', $updatedData);
} else {
    // Create a new JavaScript file with the latest data
    $file = fopen('assets/js/data.js', 'w');
    fwrite($file, "export var dataArray = $jsonData;");
    fclose($file);
}

?>