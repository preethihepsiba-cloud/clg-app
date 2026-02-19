# 🎓 Student Registration System (PHP + MySQL + Bootstrap)

A simple student registration system with photo upload built using:

- PHP (MySQLi with Prepared Statements)
- MySQL / MariaDB
- Bootstrap 5
- Apache (LAMP Stack)

---

## 📌 Features

- Student Registration Form
- Photo Upload Support
- Secure Prepared Statements
- Bootstrap Styled UI
- View Registered Students
- MySQL User with Restricted Access

---

# 🚀 Server Installation Guide (Debian / Ubuntu VM)

### 1️⃣ Install LAMP Stack and Git

```bash
sudo apt update
sudo apt install apache2 mariadb-server php libapache2-mod-php php-mysql -y
sudo apt install git -y
2️⃣ Clone the Git Repository
cd /var/www/html
sudo git clone https://github.com/preethihepsiba-cloud/clg-app.git
Your project folder structure should look like:

clg-app/
├── index.php
├── register.php
├── view.php
├── database.php
├── README.md
├── .gitignore
└── uploads/
    └── .gitkeep

3️⃣ Set Permissions
sudo chown -R www-data:www-data /var/www/html/clg-app
sudo chmod -R 755 /var/www/html/clg-app

sudo chown -R www-data:www-data /var/www/html/clg-app/uploads
sudo chmod -R 775 /var/www/html/clg-app/uploads

4️⃣ Create Database and User
sudo mysql
In the MySQL prompt:

CREATE DATABASE IF NOT EXISTS studentdb;
CREATE USER 'dbadmin'@'localhost' IDENTIFIED BY 'admin@123';
GRANT ALL PRIVILEGES ON studentdb.* TO 'dbadmin'@'localhost';
FLUSH PRIVILEGES;
EXIT;

5️⃣ Restart Apache
sudo systemctl restart apache2

6️⃣ Access the Application
Create tables - do this only once
http://[EXTERNAL_IP]/clg-app/database.php

Open main app:
http://[EXTERNAL_IP]/clg-app/