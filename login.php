<?php
include 'includes/header.php';
include 'db/config.php';
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);
$role = $conn->real_escape_string($_POST['role']);
$sql = "SELECT * FROM members WHERE email='$email' AND password='$password' AND role='$role'";
$result = $conn->query($sql);
if ($result && $result->num_rows == 1) {
$user = $result->fetch_assoc();
$_SESSION['user_id'] = $user['id'];
$_SESSION['role'] = $user['role'];
if ($user['role'] == 'admin') {
header("Location: admin_dashboard.php");
} else {
header("Location: member_dashboard.php");
}
exit();
} else {
$error = "Invalid email, password, or role.";
}
}
?>
<style>
.login-container {
background: #fff;
padding: 30px;
max-width: 400px;
margin: 80px auto;
border-radius: 8px;
box-shadow: 0 0 12px rgba(0,0,0,0.1);
text-align: center;
font-family: Arial, sans-serif;
}
.login-container h2 { margin-bottom: 20px; color: #2c3e50; }
.login-container input, .login-container select {
width: 90%; padding: 12px; margin: 10px 0; font-size: 16px; border-radius: 4px; border: 1px solid #ccc;
}
.login-container input[type="submit"] {
background: #27ae60; color: white; border: none; cursor: pointer; font-weight: bold; transition: background 0.3s ease;
}
.login-container input[type="submit"]:hover { background: #219150; }
.error { color: red; margin: 15px 0; }
a { color: #3498db; text-decoration: none; }
</style>
<div class="login-container">
<h2>Login to PowerFit Gym</h2>
<?php if ($error): ?>
<p class="error"><?php echo $error; ?></p>
<?php endif; ?>
<form method="post" action="">
<input type="email" name="email" placeholder="Email" required><br>
<input type="password" name="password" placeholder="Password" required><br>
<select name="role" required>
<option value="">Select Role</option>
<option value="member">Member</option>
<option value="admin">Admin</option>
</select><br>
<input type="submit" value="Login">
</form>
<p><a href="register.php">New Member? Register here</a></p>
</div>
<?php include 'includes/footer.php'; ?>
