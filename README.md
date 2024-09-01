# List Management System

An open-source list management system built using TALL stack.

## To-Dos
- [x] CRUD Tags
- [x] CRUD Items
- [ ] CRUD Listing
- [ ] Copy Listing Item as user-friendly text in Whatsapp to Clipboard
- [ ] Offline/Guest version using LocalStorage
- [ ] Manage Users
- [ ] Manage Roles & Permissions

## Features

### Admin Features
- Manage Lists
- Manage Users
- Manage Roles
- Manage Permissions

### User Features
- Manage Personal Profile
- Manage Personal Lists

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
2. Login with the default admin credentials:
    - Email: admin@azriadam.my
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
