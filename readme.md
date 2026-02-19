# 🎓 Student Registration System (PHP + MySQL + Bootstrap)

A simple student registration system with photo upload built using:

- PHP (MySQLi with Prepared Statements)
- MySQL
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

# 🚀 Server Installation Guide (Debian / Ubuntu VM)

## 1 Install LAMP Stack

```bash
sudo apt update
sudo apt install apache2 mariadb-server php libapache2-mod-php php-mysql -y


sudo systemctl restart apache2

## 2 clone git repo

## 3 give permissions for uploads folder
cd /var/www/html/clg-app
sudo chown -R www-data:www-data uploads

## Restart Apache
sudo systemctl restart apache2

## Open http://[external IP]/database.php

## Open http://[external IP]/register.php





