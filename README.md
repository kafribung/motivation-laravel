# Laravel Project Name

A brief description of your Laravel project.

## Running with the Traditional Approach

1. Ensure that PHP, Composer, and [Laravel Sail](https://laravel.com/docs/8.x/sail) are installed on your computer.

2. Clone this repository:

    ```bash
    git clone https://github.com/kafribung/motivation-laravel
    ```

3. Navigate to the project directory:

    ```bash
    cd motivation-laravel
    ```

4. Copy the `.env.example` file to `.env`:

    ```bash
    cp .env.example .env
    ```

5. Generate the Laravel application key:

    ```bash
    php artisan key:generate
    ```

6. Install dependencies:

    ```bash
    composer install
    ```

7. Run migrations

    ```bash
    php artisan migrate
    ```

8. Seed the database:

    ```bash
    php artisan db:seed
    ```

9. Install passport:

    ```bash
   php artisan passport:install
    ```

10. Start the server:

    ```bash
    php artisan serve
    ```

   The Laravel project will be accessible at [http://localhost:8000](http://localhost:8000/api).
