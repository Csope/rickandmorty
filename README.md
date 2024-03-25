# RICK AND MORTY EPISODES

## Requirements
PHP 8.2.1
node v20.9.0 (npm v10.1.0)
Composer version 2.5.1
VITE v5.2.6

## Installation

Clone repository
```bash
 git clone https://github.com/Csope/rickandmorty.git
```

Copy environment
```bash
 cp .env.example .env
```

Install dependencies
```bash
 composer install
```

Create database

Run migration 
```bash
 php artisan migrate
```

Store datas from api 
```bash
 php artisan app:store-episodes
```

Install js dependencies 
```bash
    npm install
```
Run Vite
```bash
   npm run dev
```

Run local webserver
```bash
   php artisan serve
```

