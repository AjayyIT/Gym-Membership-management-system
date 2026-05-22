<?php
include 'includes/header.php';
include 'db/config.php';
$plans = $conn->query("SELECT id, name FROM plans");
?>
<div style="max-width: 400px; margin: 50px auto; text-align: center;">
<h2>Register</h2>
<form method="post" action="register_process.php" style="display: flex; flex-direction: column; gap: 15px;">
<input type="text" name="name" placeholder="Full Name" required style="padding: 8px; font-size: 16px;">
<input type="email" name="email" placeholder="Email" required style="padding: 8px; font-size: 16px;">
<input type="password" name="password" placeholder="Password" required style="padding: 8px; font-size: 16px;">
<input type="text" name="phone" placeholder="Phone Number" required style="padding: 8px; font-size: 16px;">
<select name="plan_id" required style="padding: 8px; font-size: 16px;">
<?php while ($plan = $plans->fetch_assoc()): ?>
<option value="<?= $plan['id'] ?>"><?= htmlspecialchars($plan['name']) ?></option>
<?php endwhile; ?>
</select>
<input type="submit" value="Register" style="padding: 10px; font-size: 18px; cursor: pointer; background-color: #007bff; color: white; border: none; border-radius: 5px;">
</form>
</div>
