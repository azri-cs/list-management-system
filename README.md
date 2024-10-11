# List Management System

An open-source list management system built using TALL stack. A list is a collection of items with categorization using tag(s).
User will be able to copy all the items in a list for quick-response and one source of truth when using Whatsapp as medium.
User also will be able to use this as source of truth instead of scattered information inside documents.

## Use-cases
1. Initial profiling for job/house/room hunting via Whatsapp.
2. Single source of truth.

## Features

### User Features
- Manage Personal Profile
- Manage Personal Lists
- Manage Personal Tags
- Manage Personal Items

## Requirements

- PHP 8.2+
- MySQL 8.0+
- NodeJS 20.0+

## Installation

1. Clone the repository:
   ```
   git clone https://github.com/azri-cs/list-management-system.git
   ```

2. Navigate to the project directory:
   ```
   cd list-management-system
   ```

3. Install dependencies:
   ```
   composer install && npm install && npm run build
   ```

4. Copy the `.env.example` file to `.env` and configure your database settings.

5. Generate application key:
   ```
   php artisan key:generate
   ```

6. Run migrations and optionally seed the database:
   ```
   php artisan migrate --seed
   ```

7. Start the development server:
   ```
   php artisan serve
   ```

## Usage

1. Access the application at `http://localhost:8000`
2. Login with the default user credentials:
    - Email: user@azriadam.my
    - Password: abcd2134

## Contributing

We welcome contributions to improve the List Management System. Please follow these steps to contribute:

1. Fork the repository
2. Create a new branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is open-source and available under the MIT License. See the [LICENSE.md](LICENSE.md) file for more information.

## Support

If you encounter any issues or have questions, please [open an issue](https://github.com/azri-cs/list-management-system/issues) on GitHub.
