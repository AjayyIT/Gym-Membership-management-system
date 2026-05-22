<?php
include 'includes/header.php';
include 'db/config.php';
if ($_SESSION['role'] != 'admin') {
header("Location: logout.php");
exit();
}
$total = $conn->query("SELECT COUNT(*) AS total FROM members WHERE role='member'")->fetch_assoc()['total'];
$active = $conn->query("SELECT COUNT(*) AS total FROM members WHERE status='active' AND role='member'")->fetch_assoc()['total'];
$inactive = $conn->query("SELECT COUNT(*) AS total FROM members WHERE status='inactive' AND role='member'")->fetch_assoc()['total'];
$plans = $conn->query("SELECT COUNT(*) AS total FROM plans")->fetch_assoc()['total'];
$checkins_today = $conn->query("SELECT COUNT(*) AS total FROM attendance WHERE DATE(check_in) = CURDATE()")->fetch_assoc()['total'];
?>
<style>
body { background: #f0f4f8; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
.dashboard { max-width: 600px; margin: 40px auto; background: white; border-radius: 12px; box-shadow: 0 6px 18px rgba(0,0,0,0.1); padding: 30px 40px; text-align: center; }
.dashboard h2 { margin-bottom: 25px; font-weight: 700; color: #333; letter-spacing: 1px; font-size: 28px; }
.dashboard p { font-size: 18px; color: #555; margin: 12px 0; }
.dashboard p strong { color: #222; font-weight: 600; }
.dashboard a { display: inline-block; margin: 18px 12px 0; padding: 10px 22px; background-color: #007bff; color: white; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease; box-shadow: 0 4px 8px rgba(0,123,255,0.3); }
.dashboard a:hover { background-color: #0056b3; box-shadow: 0 6px 14px rgba(0,86,179,0.6); }
</style>
<div class="dashboard">
<h2>Admin Dashboard</h2>
<p><strong>Total Members:</strong> <?= $total ?></p>
<p><strong>Active Members:</strong> <?= $active ?></p>
<p><strong>Inactive Members:</strong> <?= $inactive ?></p>
<p><strong>Available Plans:</strong> <?= $plans ?></p>
<p><strong>Today's Check-ins:</strong> <?= $checkins_today ?></p>
<p>
<a href="manage_members.php">Manage Members</a>
<a href="manage_plans.php">Manage Plans</a>
<a href="attendance_report.php">Attendance Report</a>
<a href="logout.php">Logout</a>
</p>
</div>
