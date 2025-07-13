# Metal Merch - Punk E-commerce Platform

A rebellious e-commerce platform built with Laravel, featuring a punk aesthetic with a pink accent theme. "Riot in Style" - where punk meets fashion!

## 🎸 Features

-   **Customer Features**

    -   User Authentication (Login/Register)
    -   Product Browsing by Categories
    -   Shopping Cart Management
    -   Order Processing & Tracking
    -   User Profile Management

-   **Admin Dashboard**

    -   Product Management
    -   Category Management
    -   Order Management
    -   Customer Management
    -   Sales Analytics

-   **Design Elements**

    -   Punk-inspired UI with pink (#e83e8c) accent
    -   Orbitron font for headings
    -   Custom category cards with hover effects
    -   Responsive design for all devices
    -   Dark mode support

-   **E-commerce Features**
    -   Fast "Rebel Delivery" shipping
    -   100% authentic product guarantee
    -   14-day return policy
    -   24/7 customer support

## 🚀 Prerequisites

-   PHP >= 8.1
-   Composer
-   Docker & Docker Compose
-   Node.js & NPM

## 💿 Setup Instructions

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

    - MySQL database (localhost:3306)
    - Adminer (http://localhost:8080)

7. **Run Migrations**

    ```bash
    php artisan migrate
    ```

8. **Start the Application**
    ```bash
    php artisan serve
    ```
    Visit http://localhost:8000 to see your punk e-commerce in action!

## 🎨 Design System

-   **Colors**

    -   Primary: #e83e8c (Pink)
    -   Background: White/Dark mode supported
    -   Text: Black/White (dark mode)

-   **Typography**

    -   Headings: Orbitron (for punk aesthetic)
    -   Body: System default

-   **Components**
    -   Custom category cards with icon animations
    -   Product cards with hover effects
    -   Feature cards with gradient borders
    -   Testimonial cards with pink accents

## 🛠️ Database Management

Access Adminer at http://localhost:8080 with:

-   System: MySQL
-   Server: mysql
-   Username: dev
-   Password: devpass
-   Database: dev_db

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a new Pull Request

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🎵 Project Motto

"Punk bukan tren, ini perlawanan. Temukan merch yang ngelawan arus!"
