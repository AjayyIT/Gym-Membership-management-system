<?php
include 'db/config.php';
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$plan_id = $_POST['plan_id'];
$sql = "INSERT INTO members (name, email, password, phone, plan_id, role)
VALUES ('$name', '$email', '$password', '$phone', '$plan_id', 'member')";
if ($conn->query($sql) === TRUE) {
echo "Registration successful. Wait for admin approval.";
} else {
echo "Error: " . $conn->error;
}
?>
