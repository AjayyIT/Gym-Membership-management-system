Gym Membership Management System

📌 Overview:
The Gym Membership Management System is a web-based application developed using PHP and MySQL that helps manage gym operations efficiently. The system provides functionalities for member registration, attendance tracking, membership plan management, and administrative control.
The application supports separate dashboards for administrators and gym members.

🚀 Features:
- Admin Features
  - Admin login
  - Manage gym members
  - Activate/deactivate memberships
  - Manage membership plans
  - View attendance reports
  - Dashboard analytics
- Member Features
  - Member registration and login
  - View membership details
  - Update profile
  - Check-in and check-out system
  - Track membership status

🛠 Technologies Used:
- Frontend
  - HTML
  - CSS
- Backend
  - PHP
- Database
  - MySQL
- Server Environment
  - XAMPP

📂 Project Structure:
```
gym-membership-management-system/
│
├── assets/
│   └── style.css
│
├── db/
│   └── config.php
│
├── includes/
│   ├── header.php
│   └── footer.php
│
├── database.sql
│
├── index.php
├── login.php
├── register.php
├── register_process.php
├── logout.php
│
├── admin_dashboard.php
├── member_dashboard.php
├── manage_members.php
├── manage_plans.php
├── attendance_report.php
├── profile.php
├── checkin.php
├── checkout.php
│
├── README.md
├── LICENSE
└── .gitignore
```
⚙️ Modules Included:
- Authentication Module
- Registration Module
- Membership Management
- Attendance Management
- Admin Dashboard
- Member Dashboard
- Profile Management

▶️ How to Run the Project:
- Requirements
  - XAMPP
  - PHP
  - MySQL
  - Web Browser
- Steps
  1. Install XAMPP
  2. Move project folder into:
    - htdocs/
  3. Start:
    - Apache
    - MySQL
  4. Open phpMyAdmin
  5. Create database:
    - gym_db
  6. Import:
    - database.sql
  7. Open browser and run:
    - http://localhost/gym_management/

💻 Key Functionalities:
- User Authentication
- Session Handling
- Attendance Tracking
- Membership Expiry Calculation
- CRUD Operations
- Role-Based Access

📈 Future Enhancements
- Payment gateway integration
- QR code attendance
- BMI calculator
- Workout tracking
- Trainer management
- Email notifications
- Mobile responsive design

👨‍💻 Author:
Ajay RS

📜 License:
This project is licensed under the MIT License.
