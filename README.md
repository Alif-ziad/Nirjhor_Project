<div align="center">

# Nirjhor
### Multi-role E-commerce Marketplace Management System

![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=flat-square&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat-square&logo=css3&logoColor=white)
![Status](https://img.shields.io/badge/status-academic%20project-blue?style=flat-square)

</div>

Nirjhor is a PHP/MySQL marketplace project built around three roles: **customer, seller, and administrator**. The codebase implements registration/login, seller approval, product submission and approval, product browsing, a session-backed cart, checkout/order creation, seller product management, and administrator reporting.

## Project snapshot

| Area | Implementation |
|---|---|
| Backend | PHP |
| Database | MySQL / MariaDB |
| Frontend | HTML, CSS |
| Application style | Controller / model / view-style organization |
| User roles | Customer, seller, administrator |
| Main workflows | Authentication, approvals, product management, cart, checkout, orders, reports |
| Status | Academic project / portfolio demonstration |

## What the project demonstrates

- Role-based web application flows using PHP sessions
- Controller/model/view-style project organization
- MySQL-backed users, products, orders, and order items
- File upload handling for product images
- Multi-stage approval workflows for sellers and products
- Session cart and checkout logic
- Administrative reporting and marketplace management

## Role workflows

| Role | Implemented workflow |
|---|---|
| **Customer** | Register/login, browse approved products, add items to cart, update quantities, checkout, and view order history |
| **Seller** | Register as a seller, wait for administrator approval, add products, upload product images, and manage submitted products |
| **Administrator** | Approve/deny sellers, approve/deny products, review users, and view marketplace/order statistics |

## Application flow

```text
Registration / Login
        │
        ├── Customer → Products → Cart → Checkout → Orders
        │
        ├── Seller → Approval → Dashboard → Add/Manage Products
        │
        └── Admin → Dashboard → Users / Product Approval / Reports
```

## Repository structure

```text
.
├── README.md
├── nirjhor.sql                     # Database schema + demo seed data
├── WT Project Proposal.docx        # Original academic project proposal
├── products/                       # Product-image source assets
└── nirjhor/
    ├── index.php                   # Entry point
    ├── assets/
    │   └── images/                 # Application/product images
    ├── controllers/
    │   ├── authController.php
    │   ├── cartController.php
    │   ├── orderController.php
    │   └── productController.php
    ├── models/
    │   ├── dbConnect.php
    │   ├── userModel.php
    │   ├── productModel.php
    │   └── orderModel.php
    └── views/
        ├── admin/
        ├── auth/
        ├── customer/
        ├── seller/
        ├── layout/
        └── css/
```

## Database model

The SQL dump defines the core marketplace entities:

| Table | Purpose |
|---|---|
| `users` | Customer, seller, and administrator accounts plus seller approval state |
| `products` | Seller-owned products, stock, image path, and approval state |
| `orders` | Customer orders and total amount |
| `order_items` | Individual products/quantities saved for each order |

## Run locally

### Requirements

- PHP
- MySQL / MariaDB
- A local web server such as Apache (XAMPP is sufficient)

### Setup

1. Clone or download this repository into your web-server directory.
2. Start **Apache** and **MySQL**.
3. Create a database named:

```text
nirjhor
```

4. Import `nirjhor.sql` into that database.
5. Check `nirjhor/models/dbConnect.php` and update the local database host/user/password/port if your setup differs.
6. Open the application through your local server, for example:

```text
http://localhost/Nirjhor_Project/nirjhor/
```

The exact URL depends on where you place the repository under your local web root.

## Current implementation notes

> **Important:** This repository preserves the original academic implementation. It is suitable for local demonstration and code review, but it should **not** be deployed unchanged as a production commerce platform.

### Security limitations

The audited version currently includes several patterns that would need to be redesigned before real deployment:

- Passwords are handled as plaintext in the academic authentication flow.
- Several SQL statements are built through direct string interpolation rather than prepared statements.
- Local database credentials are hard-coded in `dbConnect.php`.
- Some state-changing actions use GET requests and do not implement CSRF protection.
- Session hardening and ownership/authorization checks are incomplete in parts of the application.
- Checkout/order creation is not wrapped in a database transaction.

A production rewrite should use `password_hash()` / `password_verify()`, prepared statements, environment-based configuration, CSRF tokens, stricter authorization checks, transaction handling, input/output escaping, and hardened session settings.

## Known code-quality items

- The repository contains demo seed data intended for local testing only.
- Product images are intentionally included as demonstration assets and contribute substantially to repository size.
- Some pages contain duplicated/legacy markup that can be cleaned during a future refactor.
- The project would benefit from centralized authorization middleware and a routing layer.
- Automated tests are not currently included.

## Project status

**Academic project / portfolio demonstration.** The strongest parts of the current repository are its multi-role workflow, marketplace data model, approval system, and end-to-end PHP/MySQL application flow.

## Author

**MD Alif Ziad Sarkar**  
BSc in Computer Science and Engineering, American International University-Bangladesh (AIUB)
