<?php
include 'includes/header.php';
include 'db/config.php';
$report = $conn->query("
SELECT a.check_in, a.check_out, m.name
FROM attendance a
JOIN members m ON a.member_id = m.id
");
?>
<div style="max-width:700px; margin:40px auto; font-family:sans-serif; text-align:center;">
<h2>Attendance Report</h2>
<table border="1" cellspacing="0" cellpadding="8" style="width:100%; border-collapse:collapse;">
<thead style="background:#007bff; color:#fff;"><tr><th>Member</th><th>Check In</th><th>Check Out</th></tr></thead>
<tbody>
<?php while ($row = $report->fetch_assoc()): ?>
<tr>
<td><?= htmlspecialchars($row['name']) ?></td>
<td><?= htmlspecialchars($row['check_in']) ?></td>
<td><?= htmlspecialchars($row['check_out']) ?></td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
</div>
