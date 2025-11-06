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

## API Endpoints
- GET /api/departments — list departments
- POST /api/departments — create department (X-ROLE: admin)
- GET /api/employees — list employees
- POST /api/employees — create employee (X-ROLE: admin)
- DELETE /api/employees/{id} — soft delete (X-ROLE: admin)
