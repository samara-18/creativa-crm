# Creativa CRM - Laravel 12

A lightweight CRM application built on Laravel 12 with AdminLTE, offering company and employee management, multi-language support, email notifications, and integration with DataTables for enhanced UI/UX.

---

## 🚀 Project Overview

This CRM system allows authenticated users to manage:

* Companies (create, edit, delete, view, filter)
* Employees (associated with companies)
* Dashboard with localized welcome message

It includes:

* AdminLTE UI theme
* Multi-language support (EN/EL)
* DataTables for dynamic tables
* Email notifications on new company creation
* Feature and unit testing using PHPUnit

---

## 🔧 Installation & Setup

1. Clone the repository
2. Install dependencies:

```bash
composer install
npm install && npm run build
```

3. Set up `.env` file:

```bash
cp .env.example .env
```

4. Configure database and mail settings (see below)
5. Run the database migrations and seeders:

```bash
php artisan migrate --seed
```

6. Start the development server:

```bash
php artisan serve
```

---

## 🔑 Login Details

After seeding, use the following login:

* **Email:** `admin@example.com`
* **Password:** `password`

To change the default admin email:

### 1. `.env`

```env
ADMIN_EMAIL=admin@example.com
```

### 2. `config/mail.php`

```php
'admin_email' => env('ADMIN_EMAIL', 'admin@example.com'),
```

### 3. `App\Notifications\NewCompanyNotification`

Use `config('mail.admin_email')` to send notifications to admin.

---

## 🌐 Multi-Language Support

* Locale switcher in the top navbar.
* Strings are stored in `resources/lang/en/messages.php` and `resources/lang/el/messages.php`
* Middleware `SetLocale.php` uses session to store user-selected locale.

---

## 📊 DataTables Integration

* Included via CDN in `app.blade.php`
* Tables enhanced for pagination, filtering, responsiveness
* Applied to both companies and employees index views

---

## 📧 Email Notifications

On company creation, an email is sent to the admin.

Uses Mailtrap by default (configured in `.env`):

```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_user
MAIL_PASSWORD=your_pass
MAIL_FROM_ADDRESS=admin@example.com
MAIL_FROM_NAME="Creativa CRM"
```

---

## ✅ Testing

1. Set up `.env.testing`:

```env
DB_CONNECTION=mysql
DB_DATABASE=laravel_test
DB_USERNAME=root
DB_PASSWORD=your_root_password
```

2. Run tests:

```bash
php artisan test
```

Tests include:

* Unit: basic assertions
* Feature: authentication tests (login, logout, password confirmation)

---

## 📌 Upcoming Improvements

* Polish the dashboard and welcome page UI
* Ensure all PHPUnit feature tests pass
* Improve layout consistency across views
* Apply multilingual support for all the project files
* Enhance multilingual SEO URL support

---

## 📁 Important Files

* `routes/web.php` - main route definitions
* `app/Http/Middleware/SetLocale.php` - locale switcher logic
* `app/Http/Controllers/CompanyController.php` & `EmployeeController.php`
* `resources/views/` - all blade templates
* `resources/lang/en/` and `el/` - translation files
* `tests/Feature/Auth/` - auth-related tests
* `config/mail.php` - admin email configuration

---

## 🧑‍💻 Author

Built and maintained by **Penny Samara** with Laravel 12 
