# Sambat Urip Project

A web application built with Laravel that provides user authentication and management system.

## Prerequisites

- PHP >= 8.1
- Composer
- Docker & Docker Compose
- Node.js & NPM

## Setup Instructions

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd <project-directory>
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install and compile frontend assets**
   ```bash
   npm install
   npm run dev
   ```

4. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure Database Connection**
   
   Update your `.env` file with these database credentials:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=dev_db
   DB_USERNAME=dev
   DB_PASSWORD=devpass
   ```

6. **Start Docker Services**
   ```bash
   docker-compose up -d
   ```
   This will start:
   - MySQL database (accessible at localhost:3306)
   - Adminer (database management tool, accessible at http://localhost:8080)

   Database Credentials for Adminer:
   - System: MySQL
   - Server: mysql
   - Username: dev
   - Password: devpass
   - Database: dev_db

7. **Run Migrations**
   ```bash
   php artisan migrate
   ```

8. **Start the Application**
   ```bash
   php artisan serve
   ```
   The application will be available at http://localhost:8000

## Features

- Customer Authentication (Login/Register)
- User Profile Management
- Responsive Navigation
- Modern UI with TailwindCSS

## Database Management

You can manage the database using Adminer:
1. Open http://localhost:8080 in your browser
2. Use the database credentials mentioned above
3. You can view, edit, and manage your database tables through the web interface

## Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a new Pull Request

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT). 