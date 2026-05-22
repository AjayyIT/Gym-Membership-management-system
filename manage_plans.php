<?php
include 'includes/header.php';
include 'db/config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$name = $conn->real_escape_string($_POST['name']);
$price = $conn->real_escape_string($_POST['price']);
$duration = (int)$_POST['duration'];
$conn->query("INSERT INTO plans (name, price, duration) VALUES ('$name', '$price', $duration)");
header("Location: manage_plans.php");
exit();
}
$plans = $conn->query("SELECT * FROM plans");
?>
<div style="max-width:600px; margin:40px auto; font-family:sans-serif; text-align:center;">
<h2>Manage Plans</h2>
<form method="post" style="margin-bottom:20px;">
<input name="name" placeholder="Plan Name" required style="padding:8px; width:30%; margin-right:5px;">
<input name="price" placeholder="Price" required style="padding:8px; width:20%; margin-right:5px;">
<input name="duration" type="number" placeholder="Duration (days)" required min="1" style="padding:8px; width:25%; margin-right:5px;">
<input type="submit" value="Add" style="padding:8px 15px; cursor:pointer;">
</form>
<table border="1" cellspacing="0" cellpadding="8" style="width:100%; border-collapse:collapse;">
<thead style="background:#007bff; color:#fff;"><tr><th>Name</th><th>Price</th><th>Duration</th></tr></thead>
<tbody>
<?php while ($row = $plans->fetch_assoc()): ?>
<tr>
<td><?= htmlspecialchars($row['name']) ?></td>
<td>$<?= htmlspecialchars($row['price']) ?></td>
<td><?= htmlspecialchars($row['duration']) ?> days</td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
</div>
