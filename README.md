# Lost and Found Management System

A web-based **Lost and Found Management System** developed using **PHP, MySQL, Bootstrap, HTML, CSS, and JavaScript**. The system provides a platform for students to report lost or found items, manage item records, and communicate with administrators. Administrators can manage users, item locations, document types, and generate reports.

---

## Features

### Student Module
- Secure login
- Report lost and found items
- View submitted reports
- Manage personal profile
- Contact administrators
- Receive messages and updates

### Admin Module
- Admin dashboard
- Manage users
- Manage item locations
- Manage document/item types
- View and manage all reports
- Generate reports
- Send messages to users

---

## Technologies Used

- PHP
- MySQL
- HTML5
- CSS3
- Bootstrap
- JavaScript

---

## Project Structure

```
Lost-and-Found-System/
│
├── assets/
├── bootstrap/
├── custom/
│   └── css/
├── include_lf/
├── vendor/
│   └── icons/
│
├── about_us.php
├── add_doc_type.php
├── add_location.php
├── contact.php
├── home.php
├── index.php
├── logout.php
├── manage_lf.php
├── manage_users.php
├── messages.php
├── messages2.php
├── profile.php
├── report_lf.php
├── report_lost_found.sql
├── services.php
└── README.md
```

---

## System Requirements

- PHP 7.4 or later
- MySQL 5.7 or later
- Apache Web Server
- XAMPP/WAMP/LAMP
- Modern web browser

---

## Installation

### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/lost-and-found-management-system.git
```

Or download the ZIP file.

---

### 2. Move the Project

Copy the project folder into your web server directory.

**XAMPP**

```
htdocs/
```

**WAMP**

```
www/
```

---

### 3. Import the Database

1. Open **phpMyAdmin**
2. Create a database named:

```
report_lost_found
```

3. Import the database file:

```
report_lost_found.sql
```

---

### 4. Configure Database Connection

Update your database configuration file with your MySQL credentials.

Example:

```php
$host = "localhost";
$user = "root";
$password = "";
$database = "report_lost_found";
```

---

### 5. Start the Server

Start the following services in XAMPP or WAMP:

- Apache
- MySQL

---

### 6. Run the Project

Open your browser and navigate to:

```
http://localhost/lost-and-found-system/
```

---

## Default Login Credentials

### Administrator

| Username | Password |
|----------|----------|
| **201450289** | **201450289** |

### Student

| Username | Password |
|----------|----------|
| **201457289** | **201457289** |

> **Note:** It is recommended to change the default credentials after the first login for improved security.

---

## Main Pages

| Page | Description |
|------|-------------|
| index.php | Login page |
| home.php | Dashboard/Home |
| profile.php | User profile |
| report_lf.php | Report lost or found items |
| manage_lf.php | Manage lost and found reports |
| manage_users.php | Manage system users |
| add_location.php | Add item locations |
| add_doc_type.php | Add document/item types |
| messages.php | User messages |
| messages2.php | Administrative messages |
| contact.php | Contact page |
| about_us.php | About the system |
| services.php | Services page |
| logout.php | Logout |

---

## User Workflow

1. Log in using your student account.
2. Report a lost or found item.
3. View and manage your submitted reports.
4. Update your profile.
5. Receive messages and notifications from administrators.

---

## Administrator Workflow

1. Log in using the administrator account.
2. Manage users.
3. Manage lost and found records.
4. Add or update item locations.
5. Add document/item categories.
6. View reports and monitor system activity.
7. Communicate with users through the messaging system.

---

## Future Improvements

- Email notifications
- Image upload for reported items
- Search and filtering functionality
- QR code support
- SMS notifications
- Advanced reporting and analytics
- Password recovery
- Role-based access control

---

## License

This project is developed for educational purposes. You are free to modify and enhance it for learning or academic use.

---

## Author

**Nkanyiso Mkhize**

Student Project – Lost and Found Management System
