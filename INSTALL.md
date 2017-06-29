# Install

## Clone the repository
```
git clone https://github.com/gregoryduckworth/laravel-multi-auth.git
```

## Install dependencies
```
cd laravel-multi-auth
composer install
```

## Copy the environment file
```
cp .env.example .env
```

## Create a new application key
```
php artisan key:generate
```

## Edit .env file with database, password settings
```
DB_HOST=YOUR_DATABASE_HOST
DB_DATABASE=YOUR_DATABASE_NAME
DB_USERNAME=YOUR_DATABASE_USERNAME
DB_PASSWORD=YOUR_DATABASE_PASSWORD
```

## Run the migrations and seed the database (if required)
```
php artisan migrate --seed
```
