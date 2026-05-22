<?php
include 'includes/header.php';
include 'db/config.php';
if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit(); }
$id = $_SESSION['user_id'];
$success = ""; $error = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$name = $conn->real_escape_string($_POST['name'] ?? '');
$phone = $conn->real_escape_string($_POST['phone'] ?? '');
$email = $conn->real_escape_string($_POST['email'] ?? '');
$age = isset($_POST['age']) && $_POST['age'] !== '' ? (int)$_POST['age'] : 'NULL';
$gender = $conn->real_escape_string($_POST['gender'] ?? '');
$address = $conn->real_escape_string($_POST['address'] ?? '');
$age_sql = ($age === 'NULL') ? "NULL" : $age;
$update_sql = "UPDATE members SET name='$name', phone='$phone', email='$email', age=$age_sql, gender='$gender', address='$address' WHERE id=$id";
if ($conn->query($update_sql) === TRUE) { $success = "Profile updated successfully."; } else { $error = "Error updating profile: " . $conn->error; }
}
$result = $conn->query("SELECT m.*, p.name AS plan_name, p.price AS plan_price, p.duration AS plan_duration FROM members m LEFT JOIN plans p ON m.plan_id = p.id WHERE m.id = $id");
if ($result && $result->num_rows == 1) { $member = $result->fetch_assoc(); } else { echo "User not found."; exit(); }
$gender = $member['gender'] ?? ''; $address = $member['address'] ?? '';
?>
<style>
.container { display: flex; flex-direction: column; align-items: center; margin-top: 30px; gap: 40px; }
.info-box, .card { width: 750px; padding: 25px; background-color: #f9f9f9; box-shadow: 0 0 15px rgba(0,0,0,0.15); border-radius: 10px; }
.info-box h2, .card h2 { text-align: center; margin-bottom: 15px; }
.info-row { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #eee; }
.info-row strong { width: 40%; color: #555; }
form { display: flex; flex-direction: column; gap: 15px; }
.form-row { display: flex; align-items: center; gap: 15px; flex-wrap: wrap; }
label { width: 120px; font-weight: bold; }
input[type="text"], input[type="email"], input[type="number"], select { flex: 1; padding: 8px; border: 1px solid #ccc; border-radius: 5px; }
input[type="submit"] { align-self: center; padding: 10px 25px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; }
.success { color: green; text-align: center; } .error { color: red; text-align: center; }
</style>
<div class="container">
<div class="info-box">
<h2>Your Profile Information</h2>
<?php foreach ($member as $key => $value): ?>
<?php if (!is_numeric($key)): ?>
<div class="info-row"><strong><?= ucwords(str_replace("_", " ", $key)) ?>:</strong><span><?= htmlspecialchars($value) ?></span></div>
<?php endif; ?>
<?php endforeach; ?>
</div>
<div class="card">
<h2>Edit Profile</h2>
<?php if ($success): ?><div class="success"><?= htmlspecialchars($success) ?></div><?php endif; ?>
<?php if ($error): ?><div class="error"><?= htmlspecialchars($error) ?></div><?php endif; ?>
<form method="post" action="">
<div class="form-row"><label>Full Name</label><input type="text" name="name" value="<?= htmlspecialchars($member['name'] ?? '') ?>" required></div>
<div class="form-row"><label>Email</label><input type="email" name="email" value="<?= htmlspecialchars($member['email'] ?? '') ?>" required></div>
<div class="form-row"><label>Phone</label><input type="text" name="phone" value="<?= htmlspecialchars($member['phone'] ?? '') ?>" required></div>
<div class="form-row"><label>Age</label><input type="number" name="age" value="<?= htmlspecialchars($member['age'] ?? '') ?>"></div>
<div class="form-row"><label>Gender</label>
<select name="gender" required>
<option value="" <?= ($gender == '') ? 'selected' : '' ?>>Select Gender</option>
<option value="Male" <?= ($gender == 'Male') ? 'selected' : '' ?>>Male</option>
<option value="Female" <?= ($gender == 'Female') ? 'selected' : '' ?>>Female</option>
<option value="Other" <?= ($gender == 'Other') ? 'selected' : '' ?>>Other</option>
</select>
</div>
<div class="form-row"><label>Address</label><input type="text" name="address" value="<?= htmlspecialchars($address) ?>"></div>
<input type="submit" value="Update Profile">
</form>
</div>
</div>
