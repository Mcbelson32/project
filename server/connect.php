<?php

// Create connection
$conn=new mysqli('127.0.0.1','root','');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
// Create a new database
$sql = "CREATE DATABASE IF NOT EXISTS warriorsdb;";
if ($conn->query($sql) === TRUE) {
    // echo "Database created successfully or already exists\n";
} else {
    echo "Error creating database: " . $conn->error;
}

$sql = "CREATE DATABASE IF NOT EXISTS family;";
if ($conn->query($sql) === TRUE) {
    // echo "Database created successfully or already exists\n";
} else {
    echo "Error creating database: " . $conn->error;
}



$createDbQuery = "CREATE DATABASE IF NOT EXISTS `admindb`";

if ($conn->query($createDbQuery) === FALSE) {
    echo "Error creating database: " . $conn->error;
}



// Select the database
$conn->select_db('admindb');

// Create the table if it doesn't exist
$createTableQuery = "CREATE TABLE IF NOT EXISTS `admins` (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  access VARCHAR(255) NOT NULL
)";

if ($conn->query($createTableQuery) === FALSE) {
    echo "Error creating database: " . $conn->error;
}


// Create the trigger after the table creation
$query_insert = "CREATE TRIGGER IF NOT EXISTS hash_password_trigger_insert
                BEFORE INSERT ON admins
                FOR EACH ROW
                BEGIN
                    IF CHAR_LENGTH(NEW.password) != 32 THEN
                        SET NEW.password = MD5(NEW.password);
                    END IF;
                END;";

// Execute the INSERT trigger query
if (!mysqli_real_query($conn, $query_insert)) {
    echo "Error creating INSERT trigger: " . mysqli_error($conn);
}

// Create the trigger for UPDATE
$query_update = "CREATE TRIGGER IF NOT EXISTS hash_password_trigger_update
                BEFORE UPDATE ON admins
                FOR EACH ROW
                BEGIN
                    IF CHAR_LENGTH(NEW.password) != 32 THEN
                        SET NEW.password = MD5(NEW.password);
                    END IF;
                END;";

// Execute the UPDATE trigger query
if (!mysqli_real_query($conn, $query_update)) {
    echo "Error creating UPDATE trigger: " . mysqli_error($conn);
}

$conn->select_db("warriorsdb");

$table = "CREATE TABLE IF NOT EXISTS warrior (
id VARCHAR(255) UNIQUE NOT NULL DEFAULT 'N/A',
img VARCHAR(255) DEFAULT 'N/A',
u_name VARCHAR(255) NOT NULL DEFAULT 'N/A',
f_name VARCHAR(255) NOT NULL DEFAULT 'N/A',
g_name VARCHAR(255) NOT NULL DEFAULT 'N/A',
m_name VARCHAR(255) DEFAULT 'N/A',
appellation VARCHAR(255) DEFAULT 'N/A',
b_date VARCHAR(255) DEFAULT 'N/A',
b_place VARCHAR(255) DEFAULT 'N/A',
nationality VARCHAR(255) DEFAULT 'N/A',
nation VARCHAR(255) DEFAULT 'N/A',
bloodtype VARCHAR(5) DEFAULT 'N/A',
region VARCHAR(255) DEFAULT 'N/A',
warada VARCHAR(255) DEFAULT 'N/A',
kebele VARCHAR(255) DEFAULT 'N/A',
h_number VARCHAR(255) DEFAULT 'N/A',
phone VARCHAR(20) DEFAULT 'N/A',
po_box VARCHAR(10) DEFAULT 'N/A',
lang VARCHAR(255) DEFAULT 'N/A',
educ_lvl VARCHAR(255) DEFAULT 'N/A',
educ_type VARCHAR(255) DEFAULT 'N/A',
class VARCHAR(255) DEFAULT 'N/A',
c_year VARCHAR(255) DEFAULT 'N/A',
work VARCHAR(255) DEFAULT 'N/A',
experience TEXT DEFAULT 'N/A',
exp_year TEXT DEFAULT 'N/A',
exp_amount VARCHAR(255) DEFAULT '0',
round VARCHAR(255) DEFAULT 'N/A',
iswounded VARCHAR(255) DEFAULT 'N/A',
warrior_s VARCHAR(255) DEFAULT 'N/A',
award TEXT DEFAULT 'N/A',
presenter TEXT DEFAULT 'N/A',
a_year TEXT DEFAULT 'N/A',
award_amount  VARCHAR(255) DEFAULT '0',
in_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);";

if ($conn->query($table) === true) {
    // echo "Table created successfully\n";
} else {
    echo "Error creating table: " . $conn->error;
}
?>