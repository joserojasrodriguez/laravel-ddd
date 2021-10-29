
# DDD with Framework Laravel

## Installation

```bash
git clone
```

```bash
composer install
```

```bash
cp .env.example .env
```

Configure the database connection in new file .env

```bash
php artisan migrate --seed
```

```bash
php artisan serve
```

## Usage

Endpoints:
```bash
 GET  http://127.0.0.1:8000/api/user/1
 GET  http://127.0.0.1:8000/api/address/1
 POST http://127.0.0.1:8000/api/user/1/address/store
```

