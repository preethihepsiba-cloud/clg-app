<?php
$servername = "localhost";
$username = "root";
$password = "";

// Connect as root
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 1️⃣ Create Database
$sql = "CREATE DATABASE IF NOT EXISTS studentdb";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br>";
} else {
    die("Error creating database: " . $conn->error);
}

// 2️⃣ Create User
$user_sql = "CREATE USER IF NOT EXISTS 'dbadmin'@'localhost' IDENTIFIED BY 'admin@123'";
if ($conn->query($user_sql) === TRUE) {
    echo "User created successfully<br>";
} else {
    echo "User creation error: " . $conn->error . "<br>";
}

// 3️⃣ Grant Privileges
$grant_sql = "GRANT ALL PRIVILEGES ON studentdb.* TO 'dbadmin'@'localhost'";
if ($conn->query($grant_sql) === TRUE) {
    echo "Privileges granted successfully<br>";
} else {
    echo "Grant error: " . $conn->error . "<br>";
}

// 4️⃣ Flush Privileges
$conn->query("FLUSH PRIVILEGES");
echo "Privileges flushed successfully<br>";

// Select Database
$conn->select_db("studentdb");

// 5️⃣ Create Table
$table_sql = "CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(15) NOT NULL,
    course VARCHAR(100) NOT NULL,
    photo VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
