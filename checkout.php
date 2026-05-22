<?php
include 'db/config.php';
session_start();
$member_id = $_SESSION['user_id'];
$conn->query("UPDATE attendance SET check_out = NOW() WHERE member_id = $member_id AND check_out IS NULL");
header("Location: member_dashboard.php");
?>
