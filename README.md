# Laravel Project Setup Guide

This guide will walk you through the process of setting up a basic Laravel project on your machine with MySQL as the database. Make sure you have [Composer](https://getcomposer.org/) and [MySQL](https://dev.mysql.com/downloads/) installed before proceeding.

## Installation Steps

### Step 1: Clone the Repository

```bash
git clone https://github.com/yourusername/your-laravel-project.git
```

### Step 2: Install Dependencies

Navigate to the project directory and install the required dependencies using Composer.

```bash
cd your-laravel-project
composer install
```

### Step 3: Create Environment File

Copy the `.env.example` file to create a new `.env` file.

```bash
cp .env.example .env
```

### Step 4: Configure Database

Edit the `.env` file and set the database connection details.
make sure to make APP_URL=your url 

```env
APP_URL=http://127.0.0.1:8000 


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

### Step 5: Generate Application Key

Generate the application key.

```bash
php artisan key:generate
```

### Step 6: Import Database Dump

Use the MySQL client or a tool like [phpMyAdmin](https://www.phpmyadmin.net/) to import the database dump you received.



### Step 7: make a link from storage to public

```bash
php artisan storage:link
```


### Step 8: Start the Development Server

```bash
php artisan serve
```

