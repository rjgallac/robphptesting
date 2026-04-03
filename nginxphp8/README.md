# Database Setup

## Products Table

A MySQL database has been set up with a `products` table containing:
- `id` - Auto-incrementing primary key
- `title` - Product title (VARCHAR 255)
- `created_at` - Timestamp of creation

## Initialization

The database will be automatically initialized when you start the containers for the first time. Docker Compose will execute the `init.sql` file automatically.

To start the containers:
```bash
docker-compose up -d
```

2. Run the database initialization script:
```bash
docker-compose exec php-80-fpm-robtesting php /var/www/html/init_db.php
```

Or you can access it via your web server at:
```
http://localhost:8080/init_db.php
```

## Files

- `src/init_db.php` - PHP script to initialize the database
- `src/products.sql` - SQL script for the products table
- `.env` - Database credentials configuration