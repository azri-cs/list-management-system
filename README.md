# Laravel Project Boilerplate

## Overview

This is a private Laravel project boilerplate designed to kickstart new web applications. It includes common configurations, packages, and best practices to streamline the development process.

## Features

- Laravel 11.x
- Authentication system using Laravel Breeze
- Roles and Permission using `spatie/laravel-permission` packages
- Impersonation using `lab404/laravel-impersonate` package
- Log viewer using `opcodesio/log-viewer` package
- SweetAlert using `realrashid/sweet-alert` package
- Image manipulation using `intervention/image` package
- Array as Collection using `calebporzio/sushi` package
- HTML to PDF using `spatie/browsershot` package
- MediaLibrary using `spatie/laravel-medialibrary` package
- Datatables implementation using `yajra/laravel-datatables-oracle` package

## Prerequisites

- PHP 8.2 or higher
- Node.js v20 or higher

## Installation

1. Clone the repository:
   `git clone https://github.com/azri-cs/laravel-boilerplate`

2. Navigate to the project directory:
   `cd laravel-boilerplate`

3. Install PHP dependencies:
   `composer install`

4. Install JavaScript dependencies:
   `npm install`

5. Copy the example environment file:
   `cp .env.example .env`

6. Generate an application key:
   `php artisan key:generate`

7. Configure your database in the `.env` file

8. Run migrations:
   `php artisan migrate`

## Development

- To start the development server:
  `php artisan serve`

- To compile assets:
  `npm run build`

- To watch for changes in assets:
  `npm run dev`

## Customization

- Update `config/app.php` with your application details
- Modify `resources/views/layouts/app.blade.php` for the main layout template
- Add your routes in `routes/web.php` and `routes/api.php`

## Best Practices

- Follow [PSR-12 coding](https://www.php-fig.org/psr/psr-12/) standards or you can read [here](https://gist.github.com/zamaldev/77674c05345db6ae1977ba575306bfb5).
- Use feature branches and pull requests for development
- Keep the `.env.example` file updated with new environment variables

## License

This is a private project. Unauthorized copying, modification, distribution, or use of this software is strictly prohibited.
