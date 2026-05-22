<?php include 'includes/header.php'; ?>
<style>
:root {
--primary: #3498db;
--secondary: #2ecc71;
--dark: #2c3e50;
--light: #ecf0f1;
--accent: #e74c3c;
}
body {
font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
margin: 0;
padding: 0;
min-height: 100vh;
display: flex;
flex-direction: column;
}
.hero {
background: url('https://images.unsplash.com/photo-1571902943202-507ec2618e8f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center;
background-size: cover;
height: 60vh;
display: flex;
align-items: center;
justify-content: center;
position: relative;
}
.hero::before {
content: '';
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
background: rgba(0, 0, 0, 0.5);
}
.hero-content {
position: relative;
z-index: 1;
color: white;
text-align: center;
padding: 0 20px;
max-width: 800px;
}
.container {
max-width: 1200px;
margin: -50px auto 50px;
padding: 0 20px;
}
.card {
background-color: white;
border-radius: 16px;
padding: 40px;
box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
text-align: center;
}
h1 {
color: white;
font-size: 3.5rem;
margin-bottom: 20px;
text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}
.tagline {
font-size: 1.5rem;
margin-bottom: 30px;
color: var(--light);
}
p {
font-size: 1.1rem;
color: #555;
line-height: 1.8;
margin-bottom: 25px;
}
.button-group {
display: flex;
justify-content: center;
gap: 20px;
margin-top: 30px;
}
a.button {
display: inline-block;
padding: 15px 35px;
font-size: 1.1rem;
font-weight: 600;
color: white;
background-color: var(--secondary);
text-decoration: none;
border-radius: 50px;
transition: all 0.3s ease;
box-shadow: 0 4px 15px rgba(46, 204, 113, 0.4);
}
a.button.login {
background-color: var(--primary);
box-shadow: 0 4px 15px rgba(52, 152, 219, 0.4);
}
a.button:hover {
transform: translateY(-3px);
box-shadow: 0 6px 20px rgba(46, 204, 113, 0.6);
}
a.button.login:hover {
box-shadow: 0 6px 20px rgba(52, 152, 219, 0.6);
}
.features {
display: grid;
grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
gap: 30px;
margin-top: 50px;
}
.feature-card {
background: white;
border-radius: 12px;
padding: 30px;
box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
transition: transform 0.3s ease;
}
.feature-card:hover {
transform: translateY(-10px);
}
.feature-icon {
font-size: 2.5rem;
color: var(--primary);
margin-bottom: 20px;
}
.feature-title {
font-size: 1.4rem;
color: var(--dark);
margin-bottom: 15px;
}
@media (max-width: 768px) {
h1 {
font-size: 2.5rem;
}
.tagline {
font-size: 1.2rem;
}
.button-group {
flex-direction: column;
align-items: center;
}
}
</style>
<div class="hero">
<div class="hero-content">
<h1>PowerFit Gym Management</h1>
<p class="tagline">Your journey to fitness starts here</p>
</div>
</div>
<div class="container">
<div class="card">
<p>
PowerFit Gym is dedicated to helping you reach your fitness goals with state-of-the-art facilities,
certified trainers, and personalized fitness plans. Our comprehensive management system provides seamless
access to all gym services.
</p>
<div class="features">
<div class="feature-card">
<h3 class="feature-title">Member Portal</h3>
<p>Manage your profile, track workouts, and view membership details with our easy-to-use interface.</p>
</div>
<div class="feature-card">
<h3 class="feature-title">Admin Dashboard</h3>
<p>Comprehensive tools for staff to manage members, schedules, and gym operations efficiently.</p>
</div>
<div class="feature-card">
<h3 class="feature-title">Class Scheduling</h3>
<p>Book and manage fitness classes with real-time availability and automated reminders.</p>
</div>
</div>
<div class="button-group">
<a href="login.php" class="button login">Login</a>
<a href="register.php" class="button">Register</a>
</div>
</div>
</div>
<?php include 'includes/footer.php'; ?>
