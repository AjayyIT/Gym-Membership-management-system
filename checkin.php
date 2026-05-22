<?php
include 'db/config.php';
session_start();
$member_id = $_SESSION['user_id'];
$conn->query("INSERT INTO attendance (member_id, check_in) VALUES ($member_id, NOW())");
header("Location: member_dashboard.php");
?>
