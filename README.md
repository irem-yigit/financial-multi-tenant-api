# Financial Multi-Tenant API

This project demonstrates how to structure and manage a SaaS-style financial system where multiple tenants can use the same application with isolated data.

---

## Features
- Multi-tenant architecture using [stancl/tenancy](https://tenancyforlaravel.com/)
- RESTful API design
- Authentication & Authorization (Laravel Sanctum / Passport)
- Tenant isolation (separate databases or schema per tenant)
- Example financial modules (invoices, transactions, accounts)

---

## Tech Stack
- **Framework**: Laravel 12.28 (PHP 8.4)
- **Database**: MySQL
- **Multi-tenancy**: stancl/tenancy
- **Containerization**: Docker
- **Search & Filter**: ElasticSearch
- **Testing**: Postman

---

## Project Structure
```
financial-multi-tenant-api/
  ├── 📁app/
  │───└── 📁Http/
  │───────└──📁Controllers/
  │──────────└──📁AuthController.php
  │──────────└──📁Controller.php
  │───────└──📁Models/
  │──────────└──📁User.php
  │───────└──📁Providers/
  │──────────└──📁AppServiceProvider.php
  │──────────└──📁AuthServiceProvider.php
  │──────────└──📁TenancyServiceProvider.php    
  ├── 📁database/
  │ └── 📁migrations/ # Migrations for all tables
  │ └── 📁seeders/ # Seeders for all tables
  ├── 📁sql/
  │ └── schema_dump.sql # SQL export of schema
  ├── 📁routes/
  ├── 📁resources/
  └── README.md
```


## Installation

1. Clone the repository:

   ```bash
    git clone https://github.com/irem-yigit/financial-multi-tenant-api.git
   ```
2. Navigate to the project directory 

    ```bash
    cd financial-multi-tenant-api
    ```
3. Create a New Laravel Project in the Current Directory

    ```bash
    composer create-project laravel/laravel .
    ```
    ⚠️**Important**:The folder must be empty.
4. Install dependencies:

   ```bash
    composer install
   ```

5. Copy **.env** file and set up environment variables:

   ```bash
    cp .env.example .env
    php artisan key:generate
   ```
6. Generate Application Key

    ```bash
    php artisan key:generate
   ```

7. Run database migrations:

   ```bash
    php artisan migrate
   ```
5. Start the development server:

   ```bash
    php artisan serve
   ```
## Multi-Tenancy Setup
* Install tenancy package:

 ```
   composer require stancl/tenancy
   php artisan tenancy:install
   php artisan migrate
 ```

* Configure tenant routes in routes/tenant.php.

## Running Tests
 ``` 
   php artisan test
 ```

## License

This project is licensed under the MIT License
.

---
