<?php
include 'includes/header.php';
include 'db/config.php';
if (isset($_GET['toggle'])) {
$id = (int)$_GET['toggle'];
$current = $conn->query("SELECT status FROM members WHERE id=$id")->fetch_assoc()['status'];
$new = ($current == 'active') ? 'inactive' : 'active';
$conn->query("UPDATE members SET status='$new' WHERE id=$id");
header("Location: manage_members.php");
exit();
}
$members = $conn->query("SELECT * FROM members WHERE role='member'");
?>
<style>
body { background: #f9fafb; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
.container { max-width: 900px; margin: 50px auto; background: white; padding: 30px 40px; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.1); text-align: center; }
h2 { margin-bottom: 25px; color: #333; font-weight: 700; }
table { width: 100%; border-collapse: collapse; margin-top: 20px; font-size: 16px; }
th, td { padding: 12px 15px; border-bottom: 1px solid #ddd; }
th { background-color: #007bff; color: white; text-transform: uppercase; }
tr:hover { background-color: #f1f8ff; }
td.status-active { color: #28a745; font-weight: 600; }
td.status-inactive { color: #dc3545; font-weight: 600; }
a.toggle-btn { padding: 6px 15px; background-color: #17a2b8; color: white; border-radius: 6px; text-decoration: none; font-weight: 600; }
a.toggle-btn:hover { background-color: #117a8b; }
</style>
<div class="container">
<h2>Manage Members</h2>
<table>
<thead><tr><th>Name</th><th>Email</th><th>Status</th><th>Action</th></tr></thead>
<tbody>
<?php while ($row = $members->fetch_assoc()): ?>
<tr>
<td><?= htmlspecialchars($row['name']) ?></td>
<td><?= htmlspecialchars($row['email']) ?></td>
<td class="status-<?= htmlspecialchars($row['status']) ?>"><?= ucfirst(htmlspecialchars($row['status'])) ?></td>
<td><a class="toggle-btn" href="?toggle=<?= $row['id'] ?>">Toggle Status</a></td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
</div>
