# Nirjhor — E-commerce Marketplace Management System

Nirjhor is an academic PHP/MySQL marketplace project with separate **customer, seller, and administrator** workflows.

## What is implemented

- Customer registration/login and session-based access
- Product browsing and cart/checkout workflows
- Order handling
- Seller accounts and seller approval by administrators
- Seller product-management pages
- Administrator dashboard and user/product management
- MySQL database schema in `nirjhor.sql`

## Project structure

```text
nirjhor/
├── assets/
├── controllers/
├── models/
└── views/
    ├── admin/
    ├── auth/
    ├── customer/
    └── seller/
```

The application follows a simple controller/model/view organization. Authentication state is stored in PHP sessions and role checks are used to restrict customer, seller, and administrator pages.

## Run locally

1. Install a PHP + MySQL environment such as XAMPP.
2. Clone or download this repository into your web server directory.
3. Create a MySQL database named `nirjhor`.
4. Import `nirjhor.sql` into that database.
5. Check the connection settings in `nirjhor/models/dbConnect.php` for your local MySQL setup.
6. Start Apache and MySQL.
7. Open the project through your local web server and enter through the application index/home page.

## Security status

This is a **student/learning project, not a production-ready authentication system**. The current version contains security weaknesses that should be fixed before any real deployment, including plaintext password handling and SQL queries built by direct string interpolation. A production version should use `password_hash()` / `password_verify()`, prepared statements, safer configuration management, CSRF protection, and hardened session settings.

## Tech

- PHP
- MySQL
- HTML/CSS
- Session-based authentication

## Author

MD Alif Ziad Sarkar — CSE, American International University-Bangladesh (AIUB)
