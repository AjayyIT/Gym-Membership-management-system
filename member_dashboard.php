<?php
include 'includes/header.php';
include 'db/config.php';
if ($_SESSION['role'] != 'member') { header("Location: logout.php"); exit(); }
$id = $_SESSION['user_id'];
$result = $conn->query("SELECT m.*, p.name AS plan_name, p.price, p.duration, m.created_at FROM members m JOIN plans p ON m.plan_id = p.id WHERE m.id = $id");
$member = $result->fetch_assoc();
$expiry_date = date('Y-m-d', strtotime($member['created_at'] . ' + ' . $member['duration'] . ' days'));
?>
<style>
.center-container { display: flex; justify-content: center; margin-top: 50px; }
.card { width: 500px; padding: 30px; box-shadow: 0 0 10px #aaa; text-align: center; border-radius: 10px; }
.horizontal-links { margin-top: 20px; display: flex; justify-content: center; flex-wrap: wrap; gap: 15px; }
.horizontal-links a { text-decoration: none; background-color: #007bff; color: white; padding: 10px 15px; border-radius: 5px; transition: background-color 0.3s ease; }
.horizontal-links a:hover { background-color: #0056b3; }
</style>
<div class="center-container">
<div class="card">
<h2>Welcome, <?php echo $member['name']; ?></h2>
<p>Status: <?php echo $member['status']; ?></p>
<p>Plan: <?php echo $member['plan_name']; ?> (<?php echo $member['duration']; ?> days @ $<?php echo $member['price']; ?>)</p>
<p>Plan Expires On: <?php echo $expiry_date; ?></p>
<div class="horizontal-links">
<a href="checkin.php">Check In</a>
<a href="checkout.php">Check Out</a>
<a href="profile.php">Update Profile</a>
<a href="logout.php">Logout</a>
</div>
</div>
</div>
