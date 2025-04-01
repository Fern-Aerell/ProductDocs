# ProductDocs

ProductDocs is a Laravel 11-based documentation application that allows admins to easily manage product documentation.

## Requirements

- PHP 8.2 or higher
- MySQL
- Composer
- Node.js and NPM

## Technologies Used
- PHP
- Laravel 11
- Filament (For creating admin pages)
- Filament Spatie Roles Permissions (Filament plugin by Althinect for creating roles and permissions)
- Filament Forms TinyEditor (Filament plugin by Mohamed Sabil for creating a text editor)
- TailwindCSS (CSS Framework)

## Installation

Follow these steps to install and run the project:

1. **Clone the Repository**

   ```bash
   git clone https://github.com/Fern-Aerell/ProductDocs.git
   cd ProductDocs
   ```

2. **Install Dependencies**

   Make sure Composer and NPM are installed, then run:

   ```bash
   composer install
   npm install
   ```

3. **Copy the `.env` File**

   Copy the `.env.example` to `.env` and adjust the configuration as needed:

   ```bash
   cp .env.example .env
   ```

4. **Generate the Application Key**

   Run the following command to generate the application key:

   ```bash
   php artisan key:generate
   ```

5. **Migrate the Database**

   Run the migration to create the required tables:

   ```bash
   php artisan migrate
   ```

6. **Run the Seeder for User Data**

   After migration, run the seeder to create the Superadmin and Admin user data:

   ```bash
   php artisan db:seed
   ```

7. **Create the Storage Link**

   Run the following command to create a symbolic link to the storage directory:

   ```bash
   php artisan storage:link
   ```

8. **Create Icon Cache**

   Run the following command to optimize the Filament admin page:

   ```bash
   php artisan icons:cache
   ```

9. **Run the Server**

   To start the development server:

   ```bash
   php artisan serve
   ```

   Access the application at [http://127.0.0.1:8000](http://127.0.0.1:8000).

10. **Run NPM Dev**

    To compile frontend assets and run the Vite server:

    ```bash
    npm run dev
    ```

## Temporary User Data

   - **Superadmin**
     - Email: `superadmin@gmail.com`
     - Password: `123`

   - **Admin**
     - Email: `admin@gmail.com`
     - Password: `123`

## Additional Information

Make sure to check the Laravel documentation for more details on features and usage.

---

Thank you for using ProductDocs!
