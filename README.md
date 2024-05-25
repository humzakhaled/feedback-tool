# Project Name

## Introduction

This assignment is done with laravel. All points are completed.

## Live Website

Check out the live website [here](https://ikon.letpreview.com).

## Installation

To run this project locally, follow these steps:

1. Install PHP dependencies using Composer:

    ```bash
    composer install
    ```

2. Create a copy of the `.env.example` file and rename it to `.env`:

    ```bash
    cp .env.example .env
    ```

3. Generate an application key:

    ```bash
    php artisan key:generate
    ```

4. Set up database connection in the `.env` file. You may use the database name 'test'.

5. Run database migrations and seed the database:
    ```bash
    php artisan migrate:fresh --seed
    ```

## Usage

To start the Laravel development server, run the following command:

```bash
php artisan serve
```
