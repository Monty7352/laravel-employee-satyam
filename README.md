# Laravel Employee Management Assignment (Laravel 11)

## Requirements
- PHP 8.2+
- Composer
- MySQL configured in .env

## Setup
1. Clone repo from https://github.com/Monty7352/laravel-employee-satyam.git
2. composer install
3. Copy .env.example to .env and set DB credentials.
4. set DB_CONNECTION=mysql
5. php artisan key:generate

## Migrate & Seed
php artisan migrate --seed

## Serve
php artisan serve

## Queue (optional)
If using database queue:
1. php artisan queue:table(if not already)
2. php artisan migrate
3. Start worker: php artisan queue:work

To enable email sending:

Configure mail settings in your .env file:

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=yourgmail@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=yourgmail@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
Uncomment the mail dispatch line in
app/Http/Controllers/Api/EmployeeController.php:

## API Endpoints
- GET /api/departments — list departments
- POST /api/departments — create department (X-ROLE: admin)
- GET /api/employees — list employees
- POST /api/employees — create employee (X-ROLE: admin)
- DELETE /api/employees/{id} — soft delete (X-ROLE: admin)
