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
id VARCHAR(255) UNIQUE NOT NULL DEFAULT 'N/A',
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
round VARCHAR(255) DEFAULT 'N/A',
iswounded VARCHAR(255) DEFAULT 'N/A',
warrior_s VARCHAR(255) DEFAULT 'N/A',
experience TEXT DEFAULT 'Not spacified',
award TEXT DEFAULT 'Not spacified',
in_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);";

if ($conn->query($table) === true) {
    // echo "Table created successfully\n";
} else {
    echo "Error creating table: " . $conn->error;
}
?>