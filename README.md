# Student Management System

"A web-based student management platform designed to simplify academic administration. It enables administrators to manage student records, track attendance, maintain fee payments, and monitor student statistics efficiently. The admin dashboard provides complete control over student information, attendance records, and fee collections. With advanced search, filtering, CSV export, and centralized data management, the system ensures accuracy, efficiency, and a professional experience for educational institutions."

---

## 🚀 Key Features

- **Student Management:** Complete student record management, including adding, updating, viewing, and deleting student information.
- **Admin Dashboard:** Centralized dashboard displaying student statistics, attendance information, and fee collection summaries.
- **Attendance Management:** Efficient attendance tracking with Present, Absent, and Late status management.
- **Fee Management:** Student fee payment records, payment tracking, and total collection monitoring.
- **Search & Data Export:** Advanced student search, filtering, sorting, pagination, and CSV export functionality.
- **Responsive User Interface:** User-friendly interface designed for smooth access across desktop, tablet, and mobile devices.

---

## 🛠️ Tech Stack

- **Backend:** Laravel 12 / PHP
- **Database:** MySQL
- **Frontend:** HTML, CSS, Bootstrap 5, JavaScript
- **Templating Engine:** Laravel Blade
- **Dependency Management:** Composer

---

## 💻 Local Setup Instructions

Follow these step-by-step instructions to set up and run the project in your local development environment:

### 1. **Clone the Repository**

Clone the project repository to your local machine and navigate into the project directory:

```bash
git clone https://github.com/Zunair-01/student-management-system.git
cd student-management-system
```

### 2. **Install PHP Dependencies**

Install all required Composer dependencies:

```bash
composer install
```

### 3. **Configure Environment File**

Create a copy of the default environment configuration file:

```bash
# On Windows (CMD / PowerShell):
copy .env.example .env

# On Linux / macOS / Git Bash:
cp .env.example .env
```

### 4. **Generate Application Key**

Generate the Laravel security and encryption key:

```bash
php artisan key:generate
```

### 5. **Configure Database & Credentials**

Start your MySQL server (via Laragon, XAMPP, or terminal), create a database named `student_management_laravel`, and update the `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=student_management_system
DB_USERNAME=root
DB_PASSWORD=
```

### 6. **Run Database Migrations & Seeders**

Set up the database tables and populate demo admin data:

```bash
php artisan migrate --seed
```

### 7. **Start the Application**

Launch the Laravel development server:

```bash
php artisan serve
```

Access the application in your browser at: **`http://127.0.0.1:8000`**
