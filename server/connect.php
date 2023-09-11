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


$conn->select_db("warriorsdb");

$table = "CREATE TABLE IF NOT EXISTS warrior (
id VARCHAR(255) UNIQUE NOT NULL,
u_name VARCHAR(255) NOT NULL,
f_name VARCHAR(255) NOT NULL,
g_name VARCHAR(255) NOT NULL,
m_name VARCHAR(255) NOT NULL,
appellation VARCHAR(255) NOT NULL,
b_date DATE NOT NULL,
b_place VARCHAR(255) NOT NULL,
nationality VARCHAR(255) NOT NULL,
nation VARCHAR(255) NOT NULL,
bloodtype VARCHAR(5) NOT NULL,
region VARCHAR(255) NOT NULL,
warada VARCHAR(255) NOT NULL,
kebele INT(3) UNSIGNED NOT NULL,
h_number INT(5) UNSIGNED NOT NULL,
phone VARCHAR(20) NOT NULL,
po_box VARCHAR(10) NOT NULL,
language VARCHAR(255) NOT NULL,
educ_lvl VARCHAR(255) NOT NULL,
educ_type VARCHAR(255) NOT NULL,
class VARCHAR(255) NOT NULL,
work VARCHAR(255) NOT NULL,
iswounded VARCHAR(255) NOT NULL,
warrior_s VARCHAR(255) NOT NULL,
experience TEXT NOT NULL,
in_date DATE NOT NULL
);";

if ($conn->query($table) === true) {
    // echo "Table created successfully\n";
} else {
    echo "Error creating table: " . $conn->error;
}
?>
